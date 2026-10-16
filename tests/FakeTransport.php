<?php
namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\Http\TransportInterface;

final class FakeTransport implements TransportInterface
{
    /** @var list<array{method: string, uri: string, body: ?string, headers: array<string, string>}> */
    public array $requests = [];

    public function __construct(private readonly mixed $response = [])
    {
    }

    public function request(
        string $method,
        string $uri,
        ?string $body = null,
        array $headers = []
    ): mixed {
        $this->requests[] = compact('method', 'uri', 'body', 'headers');

        return $this->response;
    }

    /** @return array{method: string, uri: string, body: ?string, headers: array<string, string>} */
    public function lastRequest(): array
    {
        return $this->requests[array_key_last($this->requests)];
    }
}
