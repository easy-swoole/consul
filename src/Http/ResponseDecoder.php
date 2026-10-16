<?php
declare(strict_types=1);

namespace EasySwoole\Consul\Http;

use EasySwoole\Consul\Exception\ConsulException;
use EasySwoole\HttpClient\Bean\Response;

final class ResponseDecoder
{
    public function decode(Response $response): mixed
    {
        // EasySwoole 使用 errCode 表示连接、超时等传输层错误，此时可能没有 HTTP 状态码。
        if ($response->getErrCode()) {
            throw new ConsulException('Consul network error: ' . $response->getErrMsg());
        }

        if ($response->getStatusCode() >= 400) {
            // Consul 的错误原因头大小写不固定；不存在时回退到响应体，保留诊断信息。
            $reason = $this->header($response->getHeaders() ?? [], 'x-consul-reason')
                ?: $response->getBody();

            throw new ConsulException(sprintf(
                'Consul request failed (status: %d, reason: %s)',
                $response->getStatusCode(),
                $reason
            ));
        }

        $body = $response->getBody();
        if ($body === '') {
            return null;
        }

        // Consul 并非所有成功响应都是 JSON，例如 KV 写入可能返回纯文本布尔值。
        $decoded = json_decode($body, true);

        return json_last_error() === JSON_ERROR_NONE ? $decoded : $body;
    }

    /**
     * @param array<string, mixed> $headers
     */
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
