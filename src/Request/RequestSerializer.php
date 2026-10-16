<?php
declare(strict_types=1);

namespace EasySwoole\Consul\Request;

final class RequestSerializer
{
    public function query(BaseCommand $request): string
    {
        $data = $this->payload($request);

        // Consul 的查询参数按 RFC 3986 编码，空格会编码为 %20 而不是 +。
        return $data === [] ? '' : http_build_query($data, '', '&', PHP_QUERY_RFC3986);
    }

    public function json(BaseCommand $request): ?string
    {
        $data = $this->payload($request);

        return $data === [] ? null : json_encode($data, JSON_THROW_ON_ERROR);
    }

    /** @return array<string, mixed> */
    private function payload(BaseCommand $request): array
    {
        // 只剔除“未提供”的值；false 和 0 对 Consul API 有明确语义，必须保留。
        $data = array_filter(
            $request->toArrayWithMapping(),
            static fn (mixed $value): bool => $value !== null && $value !== ''
        );
        // url 是 SDK 内部的路由模板，不属于发送给 Consul 的业务参数。
        unset($data['url']);

        return $data;
    }
}
