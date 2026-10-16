<?php
declare(strict_types=1);

namespace EasySwoole\Consul;

use EasySwoole\Consul\Http\EasySwooleTransport;
use EasySwoole\Consul\Http\TransportInterface;
use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\Consul\Request\RequestSerializer;
use EasySwoole\HttpClient\HttpClient;

abstract class AbstractEndpoint
{
    // 仅作用于下一次请求；消费后立即清空，防止 Token 等敏感请求头串到后续调用。
    /** @var array<string, string> */
    private array $nextRequestHeaders = [];

    public function __construct(
        protected readonly ClientConfig $config,
        protected readonly TransportInterface $transport = new EasySwooleTransport(),
        protected readonly RequestSerializer $serializer = new RequestSerializer()
    ) {
    }

    protected function putJson(BaseCommand $request): mixed
    {
        // JSON 请求和 query/raw 请求分开处理，避免把 Consul 要求的原始数据二次编码。
        $headers = ['Content-Type' => HttpClient::CONTENT_TYPE_APPLICATION_JSON];

        return $this->transport->request(
            'PUT',
            $this->uri($request),
            $this->serializer->json($request),
            $this->consumeHeaders($headers)
        );
    }

    protected function putQuery(BaseCommand $request): mixed
    {
        return $this->putRaw($request, null);
    }

    protected function putRaw(BaseCommand $request, ?string $body): mixed
    {
        // KV value、Snapshot 等接口的 body 是原始字节流，请求对象只负责生成查询参数。
        $query = $this->serializer->query($request);
        $uri = $this->uri($request) . ($query === '' ? '' : '?' . $query);

        return $this->transport->request('PUT', $uri, $body, $this->consumeHeaders([]));
    }

    /** @param array<string, string> $headers */
    protected function getJson(BaseCommand $request, array $headers = []): mixed
    {
        $query = $this->serializer->query($request);
        $uri = $this->uri($request) . ($query === '' ? '' : '?' . $query);

        return $this->transport->request('GET', $uri, null, $this->consumeHeaders($headers));
    }

    /** @param array<string, string> $headers */
    protected function postJson(BaseCommand $request, array $headers = []): mixed
    {
        $headers = ['Content-Type' => HttpClient::CONTENT_TYPE_APPLICATION_JSON] + $headers;

        return $this->transport->request(
            'POST',
            $this->uri($request),
            $this->serializer->json($request),
            $this->consumeHeaders($headers)
        );
    }

    /** @param array<string, string> $headers */
    protected function deleteJson(BaseCommand $request, array $headers = []): mixed
    {
        $query = $this->serializer->query($request);
        $uri = $this->uri($request) . ($query === '' ? '' : '?' . $query);

        return $this->transport->request('DELETE', $uri, null, $this->consumeHeaders($headers));
    }

    /** @param array<string, string> $headers */
    public function withHeaders(array $headers): static
    {
        $this->nextRequestHeaders = $headers;

        return $this;
    }

    private function uri(BaseCommand $request): string
    {
        // baseUri 固定以 / 结尾，这里移除端点路径开头的 /，保证地址拼接结果稳定。
        return $this->config->baseUri() . ltrim($request->getUrl(), '/');
    }

    /**
     * @param array<string, string> $headers
     * @return array<string, string>
     */
    private function consumeHeaders(array $headers): array
    {
        // 调用方通过 withHeaders() 指定的值优先于端点默认值。
        $headers = $this->nextRequestHeaders + $headers;
        $this->nextRequestHeaders = [];

        return $headers;
    }
}
