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
    public function register(Register $register);

    public function deRegister(DeRegister $deregister);

    public function dataCenters(Datacenters $datacenters);

    public function nodes(Nodes $nodes);

    public function services(Services $services);

    public function service(Service $service);

    public function connect(Connect $connect);

    public function node(Node $node);
}
