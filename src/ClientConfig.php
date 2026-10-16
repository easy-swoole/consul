<?php
declare(strict_types=1);

namespace EasySwoole\Consul;

use InvalidArgumentException;

final class ClientConfig
{
    public readonly string $host;
    public readonly int $port;
    public readonly string $apiVersion;
    public readonly string $scheme;

    public function __construct(
        string $host = '127.0.0.1',
        int $port = 8500,
        string $apiVersion = 'v1',
        string $scheme = 'http'
    ) {
        // 在配置对象创建时完成规范化和校验，让下游代码始终使用可信的不变量。
        $host = trim($host);
        $apiVersion = trim($apiVersion, '/');
        $scheme = strtolower($scheme);

        if ($host === '') {
            throw new InvalidArgumentException('Consul host cannot be empty.');
        }
        if ($port < 1 || $port > 65535) {
            throw new InvalidArgumentException('Consul port must be between 1 and 65535.');
        }
        if ($apiVersion === '') {
            throw new InvalidArgumentException('Consul API version cannot be empty.');
        }
        if (!in_array($scheme, ['http', 'https'], true)) {
            throw new InvalidArgumentException('Consul scheme must be http or https.');
        }

        $this->host = $host;
        $this->port = $port;
        $this->apiVersion = $apiVersion;
        $this->scheme = $scheme;
    }

    public function baseUri(): string
    {
        // 末尾保留 /，端点层可以直接拼接不带前导斜线的 API 路径。
        return sprintf(
            '%s://%s:%d/%s/',
            $this->scheme,
            $this->host,
            $this->port,
            $this->apiVersion
        );
    }
}
