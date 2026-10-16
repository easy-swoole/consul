<?php
declare(strict_types=1);

namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\ClientConfig;
use EasySwoole\Consul\ConsulClient;
use EasySwoole\Consul\Exception\ConsulException;
use EasySwoole\Consul\Http\EasySwooleTransport;
use EasySwoole\Consul\Request\Agent\Service\Register as ServiceRegister;
use EasySwoole\Consul\Request\Agent\Services;
use EasySwoole\Consul\Request\Kv;
use EasySwoole\Consul\Request\Session\Create as SessionCreate;
use EasySwoole\Consul\Request\Session\Info as SessionInfo;
use EasySwoole\Consul\Request\Snapshot as SnapshotRequest;
use EasySwoole\Consul\Request\Status\Leader;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Swoole\Coroutine;
use Throwable;

final class MockConsulIntegrationTest extends TestCase
{
    /** @var resource|null */
    private static $serverProcess = null;
    private static int $port;
    private static string $stateFile;

    public static function setUpBeforeClass(): void
    {
        self::$port = self::availablePort();
        self::$stateFile = tempnam(sys_get_temp_dir(), 'mock-consul-');
        $router = __DIR__ . '/Fixtures/MockConsulRouter.php';
        $address = sprintf('127.0.0.1:%d', self::$port);

        // 使用数组命令避免 shell 转义问题；输出丢弃，防止管道缓冲区阻塞测试。
        self::$serverProcess = proc_open(
            [PHP_BINARY, '-S', $address, $router],
            [
                0 => ['file', '/dev/null', 'r'],
                1 => ['file', '/dev/null', 'a'],
                2 => ['file', '/dev/null', 'a'],
            ],
            $pipes,
            dirname($router),
            array_merge(getenv(), ['MOCK_CONSUL_STATE_FILE' => self::$stateFile])
        );

        if (!is_resource(self::$serverProcess)) {
            throw new RuntimeException('无法启动 Mock Consul 服务。');
        }

        self::waitUntilServerIsReady();
    }

    public static function tearDownAfterClass(): void
    {
        if (is_resource(self::$serverProcess)) {
            proc_terminate(self::$serverProcess);
            proc_close(self::$serverProcess);
        }
        if (isset(self::$stateFile) && is_file(self::$stateFile)) {
            unlink(self::$stateFile);
        }
    }

    public function testClientCanReadLeaderFromMockConsul(): void
    {
        $client = $this->client();

        $leader = self::inCoroutine(
            static fn (): mixed => $client->status()->leader(new Leader(['dc' => 'dc1']))
        );

        self::assertSame('127.0.0.1:8300', $leader);
    }

    public function testKvPutReachesMockConsulWithRawBodyAndEncodedQuery(): void
    {
        $transport = new EasySwooleTransport();
        $client = $this->client($transport);

        $written = self::inCoroutine(
            static fn (): mixed => $client->kv()
                ->withHeaders(['X-Consul-Token' => 'test-token'])
                ->put(new Kv(['key' => 'folder/a b', 'cas' => 7]), 'raw-value')
        );

        self::assertTrue($written);
        $received = self::inCoroutine(
            fn (): mixed => $transport->request('GET', $this->baseUri() . 'mock/last-request')
        );
        self::assertSame('PUT', $received['method']);
        self::assertSame('/v1/kv/folder%2Fa%20b?cas=7', $received['uri']);
        self::assertSame('raw-value', $received['body']);
        self::assertSame('test-token', $this->header($received['headers'], 'x-consul-token'));

        $stored = self::inCoroutine(
            static fn (): mixed => $client->kv()->read(new Kv(['key' => 'folder/a b']))
        );
        self::assertSame('folder/a b', $stored[0]['Key']);
        self::assertSame('raw-value', base64_decode($stored[0]['Value'], true));

        $deleted = self::inCoroutine(
            static fn (): mixed => $client->kv()->delete(new Kv(['key' => 'folder/a b']))
        );
        self::assertTrue($deleted);

        $error = self::exceptionInCoroutine(
            static fn (): mixed => $client->kv()->read(new Kv(['key' => 'folder/a b']))
        );
        self::assertInstanceOf(ConsulException::class, $error);
        self::assertStringContainsString('key not found', $error->getMessage());
    }

    public function testServiceRegistrationCanBeReadBack(): void
    {
        $client = $this->client();

        self::inCoroutine(static fn (): mixed => $client->agent()->serviceRegister(new ServiceRegister([
            'name' => 'orders',
            'id' => 'orders-1',
            'address' => '10.0.0.8',
            'port' => 8080,
            'meta' => ['version' => 'v2'],
            'enableTagOverride' => false,
        ])));
        $services = self::inCoroutine(
            static fn (): mixed => $client->agent()->services(new Services())
        );

        self::assertSame('orders', $services['orders-1']['Name']);
        self::assertSame(8080, $services['orders-1']['Port']);
        self::assertSame(['version' => 'v2'], $services['orders-1']['Meta']);
        self::assertFalse($services['orders-1']['EnableTagOverride']);
    }

    public function testSessionCreateAndInfoRoundTrip(): void
    {
        $client = $this->client();
        $created = self::inCoroutine(static fn (): mixed => $client->sessions()->create(new SessionCreate([
            'name' => 'deployment-lock',
            'behavior' => 'delete',
            'TTL' => '30s',
        ])));
        $sessions = self::inCoroutine(
            static fn (): mixed => $client->sessions()->info(new SessionInfo(['uuid' => $created['ID']]))
        );

        self::assertSame('mock-session-1', $created['ID']);
        self::assertSame('deployment-lock', $sessions[0]['Name']);
        self::assertSame('delete', $sessions[0]['Behavior']);
    }

    public function testBinarySnapshotCanBeRestoredAndGenerated(): void
    {
        $client = $this->client();
        $snapshot = "CONSUL\0SNAPSHOT\x01\xFF";

        $restored = self::inCoroutine(
            static fn (): mixed => $client->snapshots()->restore(new SnapshotRequest(['dc' => 'dc1']), $snapshot)
        );
        $generated = self::inCoroutine(
            static fn (): mixed => $client->snapshots()->generate(new SnapshotRequest(['dc' => 'dc1']))
        );

        self::assertTrue($restored);
        self::assertSame($snapshot, $generated);
    }

    public function testHttpErrorFromMockConsulBecomesConsulException(): void
    {
        $transport = new EasySwooleTransport();

        $error = self::exceptionInCoroutine(
            fn (): mixed => $transport->request('GET', $this->baseUri() . 'mock/error')
        );

        self::assertInstanceOf(ConsulException::class, $error);
        self::assertStringContainsString('status: 403', $error->getMessage());
        self::assertStringContainsString('mock permission denied', $error->getMessage());
    }

    private function client(?EasySwooleTransport $transport = null): ConsulClient
    {
        return new ConsulClient(
            new ClientConfig('127.0.0.1', self::$port),
            $transport ?? new EasySwooleTransport()
        );
    }

    private function baseUri(): string
    {
        return sprintf('http://127.0.0.1:%d/v1/', self::$port);
    }

    private static function availablePort(): int
    {
        $socket = stream_socket_server('tcp://127.0.0.1:0', $errorCode, $errorMessage);
        if ($socket === false) {
            throw new RuntimeException("无法分配 Mock Consul 端口：{$errorMessage} ({$errorCode})");
        }

        $address = stream_socket_get_name($socket, false);
        fclose($socket);

        return (int) substr(strrchr($address, ':'), 1);
    }

    private static function waitUntilServerIsReady(): void
    {
        for ($attempt = 0; $attempt < 100; ++$attempt) {
            $connection = @stream_socket_client(
                sprintf('tcp://127.0.0.1:%d', self::$port),
                $errorCode,
                $errorMessage,
                0.05
            );
            if ($connection !== false) {
                fclose($connection);
                return;
            }
            usleep(20_000);
        }

        throw new RuntimeException('Mock Consul 服务启动超时。');
    }

    private static function inCoroutine(callable $callback): mixed
    {
        $result = null;
        $error = null;

        Coroutine\run(static function () use ($callback, &$result, &$error): void {
            try {
                $result = $callback();
            } catch (Throwable $throwable) {
                $error = $throwable;
            }
        });

        if ($error !== null) {
            throw $error;
        }

        return $result;
    }

    private static function exceptionInCoroutine(callable $callback): Throwable
    {
        try {
            self::inCoroutine($callback);
        } catch (Throwable $throwable) {
            return $throwable;
        }

        self::fail('预期协程内抛出异常，但请求成功完成。');
    }

    /** @param array<string, mixed> $headers */
    private function header(array $headers, string $name): ?string
    {
        foreach ($headers as $key => $value) {
            if (strcasecmp((string) $key, $name) === 0) {
                return is_array($value) ? (string) reset($value) : (string) $value;
            }
        }

        return null;
    }
}
