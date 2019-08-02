<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午9:15
 */
namespace EasySwoole\Consul;

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
     * @throws \ReflectionException
     */
    public function datacenters(Datacenters $datacenters)
    {
        $this->getJson($datacenters);
    }

    /**
     * Read LAN Coordinates for all nodes
     * @param Nodes $nodes
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function nodes(Nodes $nodes)
    {
        $this->getJson($nodes);
    }

    /**
     * Read LAN Coordinates for a node
     * @param Node $node
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function node(Node $node)
    {
        if (!empty($node->getNode())) {
            $action = $node->getNode();
            $node->setNode('');
        }
        $this->getJson($node, $action);
    }

    /**
     * Update LAN Coordinates for a node
     * @param Update $update
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function update(Update $update)
    {
        $this->putJSON($update);
    }
}