<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\SnapshotInterface;
use EasySwoole\Consul\Request\Snapshot as snap;

class Snapshot extends AbstractEndpoint implements SnapshotInterface
{
    /**
     * Generate Snapshot
     * @param snap $snapshot
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function generate(snap $snapshot): mixed
    {
        return $this->getJson($snapshot);
    }

    /**
     * Restore Snapshot
     * @param snap $snapshot
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function restore(snap $request, string $snapshot): mixed
    {
        // 快照可能是二进制内容，必须原样传输，不能经过 JSON 编码。
        return $this->putRaw($request, $snapshot);
    }
}
