<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午9:05
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Coordinate\Datacenters;
use EasySwoole\Consul\Request\Coordinate\Node;
use EasySwoole\Consul\Request\Coordinate\Nodes;
use EasySwoole\Consul\Request\Coordinate\Update;

interface CoordinatesInterface
{
    public function datacenters(Datacenters $datacenters);

    public function nodes(Nodes $nodes);

    public function node(Node $node);

    public function update(Update $update);
}