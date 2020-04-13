<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:29
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\StatusInterface;
use EasySwoole\Consul\Request\Status\Leader;
use EasySwoole\Consul\Request\Status\Peers;

class Status extends BaseFunc implements StatusInterface
{
    /**
     * Get Raft Leader
     * @param Leader $leader
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function leader(Leader $leader)
    {
        return $this->getJson($leader);
    }

    /**
     * List Raft Peers
     * @param Peers $peers
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function peers(Peers $peers)
    {
        return $this->getJson($peers);
    }
}
