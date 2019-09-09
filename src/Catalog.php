<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\MissingRequiredParamsException;
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
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function register(Register $register)
    {
        if (empty($register->getNode())) {
            throw new MissingRequiredParamsException('Missing the required param: Node.');
        }
        if (empty($register->getAddress())) {
            throw new MissingRequiredParamsException('Missing the required param: Address.');
        }
        $this->putJSON($register);
    }

    /**
     * Deregister Entity
     * @param Deregister $deregister
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deRegister(Deregister $deregister)
    {
        if (empty($deregister->getNode())) {
            throw new MissingRequiredParamsException('Missing the required param: Node.');
        }
        $this->putJSON($deregister);
    }

    /**
     * List Datacenters
     * @param Datacenters $datacenters
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function dataCenters(Datacenters $datacenters)
    {
        $this->getJson($datacenters);
    }

    /**
     * List Nodes
     * @param Nodes $nodes
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function nodes(Nodes $nodes)
    {
        $this->getJson($nodes);
    }

    /**
     * List Services
     * @param Services $services
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function services(Services $services)
    {
        $this->getJson($services);
    }

    /**
     * List Nodes for service
     * @param Service $service
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function service(Service $service)
    {
        if (empty($service->getService())) {
            throw new MissingRequiredParamsException('Missing the required param: service.');
        }
        $service->url = sprintf($service->url, $service->getService());
        $service->setService('');
        $this->getJson($service);
    }

    /**
     * List Nodes for Connect-capable Service
     * @param Connect $connect
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function connect(Connect $connect)
    {
        if (empty($connect->getService())) {
            throw new MissingRequiredParamsException('Missing the required param: service.');
        }
        $connect->url = sprintf($connect->url, $connect->getService());
        $connect->setService('');
        $this->getJson($connect);
    }

    /**
     * List Services for Node
     * @param Node $node
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function node(Node $node)
    {
        if (empty($node->getNode())) {
            throw new MissingRequiredParamsException('Missing the required param: node.');
        }
        $node->url = sprintf($node->url, $node->getNode());
        $node->setNode('');
        $this->getJson($node);
    }
}