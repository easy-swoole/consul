<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午9:12
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Catalog\Connect;
use EasySwoole\Consul\Request\Catalog\Datacenters;
use EasySwoole\Consul\Request\Catalog\DeRegister;
use EasySwoole\Consul\Request\Catalog\Node;
use EasySwoole\Consul\Request\Catalog\Nodes;
use EasySwoole\Consul\Request\Catalog\Register;
use EasySwoole\Consul\Request\Catalog\Service;
use EasySwoole\Consul\Request\Catalog\Services;

interface CatalogInterface
{
    public function register(Register $register): mixed;

    public function deRegister(DeRegister $deregister): mixed;

    public function dataCenters(Datacenters $datacenters): mixed;

    public function nodes(Nodes $nodes): mixed;

    public function services(Services $services): mixed;

    public function service(Service $service): mixed;

    public function connect(Connect $connect): mixed;

    public function node(Node $node): mixed;
}
