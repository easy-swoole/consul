<?php
declare(strict_types=1);

namespace EasySwoole\Consul\Http;

interface TransportInterface
{
    /**
     * @param array<string, string> $headers
     */
    public function request(
        string $method,
        string $uri,
        ?string $body = null,
        array $headers = []
    ): mixed;
}
