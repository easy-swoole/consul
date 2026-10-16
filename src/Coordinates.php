<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午9:15
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\CoordinatesInterface;
use EasySwoole\Consul\Exception\MissingRequiredParameterException;
use EasySwoole\Consul\Request\Coordinate\Datacenters;
use EasySwoole\Consul\Request\Coordinate\Nodes;
use EasySwoole\Consul\Request\Coordinate\Node;
use EasySwoole\Consul\Request\Coordinate\Update;

class Coordinates extends AbstractEndpoint implements CoordinatesInterface
{
    /**
     * Read WAN Coordinates
     * @param DataCenters $datacenters
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function dataCenters(DataCenters $datacenters): mixed
    {
        return $this->getJson($datacenters);
    }

    /**
     * Read LAN Coordinates for all nodes
     * @param Nodes $nodes
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function nodes(Nodes $nodes): mixed
    {
        return $this->getJson($nodes);
    }

    /**
     * Read LAN Coordinates for a node
     * @param Node $node
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function node(Node $node): mixed
    {
        if (empty($node->getNode())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $node->setUrl(sprintf($node->getUrl(), $node->getNode()));
        $node->setNode('');
        return $this->getJson($node);
    }

    /**
     * Update LAN Coordinates for a node
     * @param Update $update
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function update(Update $update): mixed
    {
        if (empty($update->getDc())) {
            $update->setUrl(substr($update->getUrl(), 0, strlen($update->getUrl()) -3));
            return $this->putJson($update);
        } else {
            $update->setUrl(sprintf($update->getUrl(), '?dc=' . $update->getDc()));
            $update->setDc('');
            return $this->putJson($update);
        }
    }
}
