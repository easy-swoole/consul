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

class Snapshot extends BaseFunc implements SnapshotInterface
{
    /**
     * Generate Snapshot
     * @param snap $snapshot
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function generate(snap $snapshot) {
        return $this->getJson($snapshot);
    }

    /**
     * Restore Snapshot
     * @param snap $snapshot
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function restore(snap $snapshot)
    {
        return $this->putJSON($snapshot);
    }
}