<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午9:15
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Coordinate\Datacenters;
use EasySwoole\Consul\Request\Coordinate\Nodes;
use EasySwoole\Consul\Request\Coordinate\Node;
use EasySwoole\Consul\Request\Coordinate\Update;

class Coordinates extends BaseFunc
{
    /**
     * Read WAN Coordinates
     * @param Datacenters $datacenters
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function datacenters(Datacenters $datacenters)
    {
        $this->getJson($datacenters);
    }

    /**
     * Read LAN Coordinates for all nodes
     * @param Nodes $nodes
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function nodes(Nodes $nodes)
    {
        $this->getJson($nodes);
    }

    /**
     * Read LAN Coordinates for a node
     * @param Node $node
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function node(Node $node)
    {
        if (empty($node->getNode())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $node->setUrl(sprintf($node->getUrl(), $node->getNode()));
        $node->setNode('');
        $this->getJson($node);
    }

    /**
     * Update LAN Coordinates for a node
     * @param Update $update
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function update(Update $update)
    {
        if (empty($update->getDc())) {
            $update->setUrl(substr($update->getUrl(), 0, strlen($update->getUrl()) -3));
            $this->putJSON($update);
        } else {
            $update->setUrl(sprintf($update->getUrl(), '?dc=' . $update->getDc()));
            $update->setDc('');
            $this->putJSON($update);
        }
    }
}