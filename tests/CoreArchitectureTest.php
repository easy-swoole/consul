<?php
namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\ClientConfig;
use EasySwoole\Consul\ConsulClient;
use EasySwoole\Consul\Exception\ConsulException;
use EasySwoole\Consul\Http\ResponseDecoder;
use EasySwoole\Consul\Request\Query;
use EasySwoole\Consul\Request\RequestSerializer;
use EasySwoole\HttpClient\Bean\Response;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CoreArchitectureTest extends TestCase
{
    public function testConfigBuildsAnExplicitBaseUri(): void
    {
        $config = new ClientConfig('consul.internal', 8501, 'v2', 'https');

        self::assertSame('https://consul.internal:8501/v2/', $config->baseUri());
    }

    #[DataProvider('invalidConfigProvider')]
    public function testConfigRejectsInvalidValues(array $arguments): void
    {
        $this->expectException(InvalidArgumentException::class);

        new ClientConfig(...$arguments);
    }

    public static function invalidConfigProvider(): iterable
    {
        yield 'empty host' => [['host' => '']];
        yield 'invalid port' => [['port' => 0]];
        yield 'empty API version' => [['apiVersion' => '/']];
        yield 'invalid scheme' => [['scheme' => 'ftp']];
    }

    public function testSerializerPreservesNestedObjectsFalseAndZero(): void
    {
        $request = new Query([
            'name' => 'orders',
            'service' => ['OnlyPassing' => false, 'Failover' => ['NearestN' => 0]],
            'DNS' => ['TTL' => '10s'],
        ]);

        $data = json_decode((new RequestSerializer())->json($request), true, 512, JSON_THROW_ON_ERROR);

        self::assertSame('orders', $data['Name']);
        self::assertFalse($data['Service']['OnlyPassing']);
        self::assertSame(0, $data['Service']['Failover']['NearestN']);
        self::assertSame(['TTL' => '10s'], $data['DNS']);
    }

    public function testResponseDecoderHandlesJsonPlainTextAndHeaderCase(): void
    {
        $decoder = new ResponseDecoder();
        $json = new Response(['statusCode' => 200, 'errCode' => 0, 'body' => '{"ok":true}']);
        $plain = new Response(['statusCode' => 200, 'errCode' => 0, 'body' => 'snapshot-bytes']);

        self::assertSame(['ok' => true], $decoder->decode($json));
        self::assertSame('snapshot-bytes', $decoder->decode($plain));

        $this->expectException(ConsulException::class);
        $this->expectExceptionMessage('permission denied');
        $decoder->decode(new Response([
            'statusCode' => 403,
            'errCode' => 0,
            'headers' => ['X-Consul-Reason' => 'permission denied'],
            'body' => 'ignored',
        ]));
    }

    public function testClientReusesEndpointAndInjectedTransport(): void
    {
        $transport = new FakeTransport();
        $client = new ConsulClient(new ClientConfig(), $transport);

        self::assertSame($client->catalog(), $client->catalog());
        self::assertSame([], $transport->requests);
    }
}
