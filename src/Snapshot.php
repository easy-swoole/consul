<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Snapshot as snap;

class Snapshot extends BaseFunc
{
    /**
     * Generate Snapshot
     * @param snap $snapshot
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function generate(snap $snapshot) {
        $this->getJson($snapshot);
    }

    /**
     * Restore Snapshot
     * @param snap $snapshot
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function restore(snap $snapshot)
    {
        $this->putJSON($snapshot);
    }
}