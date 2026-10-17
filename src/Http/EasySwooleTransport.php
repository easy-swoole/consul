<?php
declare(strict_types=1);

namespace EasySwoole\Consul\Http;

use EasySwoole\Consul\TlsConfig;
use EasySwoole\HttpClient\HttpClient;
use InvalidArgumentException;

final class EasySwooleTransport implements TransportInterface
{
    public function __construct(
        private readonly ?TlsConfig $tls = null,
        private readonly ResponseDecoder $decoder = new ResponseDecoder()
    ) {
    }

    public function request(
        string $method,
        string $uri,
        ?string $body = null,
        array $headers = []
    ): mixed {
        // Transport 层只负责执行 HTTP 请求，不掺杂 Consul 端点的参数拼装逻辑。
        // 每次请求创建独立客户端，避免请求头、请求体等状态意外泄漏到下一次调用。
        $client = new HttpClient($uri);
        if ($this->tls !== null) {
            $this->tls->applyTo($client);
        }

        $response = match (strtoupper($method)) {
            'GET' => $client->get($headers),
            'POST' => $client->post($body, $headers),
            'PUT' => $client->put($body, $headers),
            'DELETE' => $client->delete($headers),
            default => throw new InvalidArgumentException("Unsupported HTTP method: {$method}"),
        };

        // 统一在解码器中处理网络错误、HTTP 错误及 JSON/纯文本响应。
        return $this->decoder->decode($response);
    }
}
