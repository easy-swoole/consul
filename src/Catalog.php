<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Catalog\Connect;
use EasySwoole\Consul\Request\Catalog\Datacenters;
use EasySwoole\Consul\Request\Catalog\Deregister;
use EasySwoole\Consul\Request\Catalog\Node;
use EasySwoole\Consul\Request\Catalog\Nodes;

use EasySwoole\Consul\Request\Catalog\Register;
use EasySwoole\Consul\Request\Catalog\Service;
use EasySwoole\Consul\Request\Catalog\Services;

class Catalog extends BaseFunc
{

    /**
     * Register Entity
     * @param Register $register
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function register(Register $register)
    {
        $this->putJSON($register);
    }

    /**
     * Deregister Entity
     * @param Deregister $deregister
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deRegister(Deregister $deregister)
    {
        $this->putJSON($deregister);
    }

    /**
     * List Datacenters
     * @param Datacenters $datacenters
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function dataCenters(Datacenters $datacenters)
    {
        $this->getJson($datacenters);
    }

    /**
     * List Nodes
     * @param Nodes $nodes
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function nodes(Nodes $nodes)
    {
        $this->getJson($nodes);
    }

    /**
     * List Services
     * @param Services $services
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function services(Services $services)
    {
        $this->getJson($services);
    }

    /**
     * List Nodes for service
     * @param Service $service
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function service(Service $service)
    {
        if (!empty($service->getService())) {
            $action = $service->getService();
            $service->setService('');
        } else {
            echo "Lack of parameters: service";
            return false;
        }
        $this->getJson($service, $action);
    }

    /**
     * List Nodes for Connect-capable Service
     * Parameters and response format are the same as service
     * @param Connect $connect
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function connect(Connect $connect)
    {
        if (!empty($connect->getService())) {
            $action = $connect->getService();
            $connect->setService('');
        } else {
            echo "Lack of parameters: service";
            return false;
        }
        $this->getJson($connect, $action);
    }

    /**
     * List Services for Node
     * @param Node $node
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function node(Node $node)
    {
        if (!empty($node->getNode())) {
            $action = $node->getNode();
            $node->setNode('');
        } else {
            echo "Lack of parameters: node";
            return false;
        }
        $this->getJson($node, $action);
    }
}