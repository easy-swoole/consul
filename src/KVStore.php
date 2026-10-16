<?php
declare(strict_types=1);

namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\KVStoreInterface;
use EasySwoole\Consul\Exception\MissingRequiredParameterException;
use EasySwoole\Consul\Request\Kv;

final class KVStore extends AbstractEndpoint implements KVStoreInterface
{
    public function read(Kv $request): mixed
    {
        $this->resolveKeyPath($request);

        return $this->getJson($request);
    }

    public function put(Kv $request, string $value): mixed
    {
        $this->resolveKeyPath($request);

        // Consul KV 的 value 是原始请求体，不能按普通对象序列化为 JSON。
        return $this->putRaw($request, $value);
    }

    public function delete(Kv $request): mixed
    {
        $this->resolveKeyPath($request);

        return $this->deleteJson($request);
    }

    private function resolveKeyPath(Kv $request): void
    {
        $key = $request->getKey();
        if ($key === null || $key === '') {
            throw new MissingRequiredParameterException('Missing the required parameter: key.');
        }

        // key 属于 URL 路径而非查询参数，必须按路径段编码后再替换路由占位符。
        $request->setUrl(sprintf($request->getUrl(), rawurlencode($key)));
        // key 已写入路径，清空后可避免序列化器再次生成重复的 key 查询参数。
        $request->setKey('');
    }
}
