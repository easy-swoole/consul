<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\CatalogInterface;
use EasySwoole\Consul\Exception\MissingRequiredParameterException;
use EasySwoole\Consul\Request\Catalog\Connect;
use EasySwoole\Consul\Request\Catalog\Datacenters;
use EasySwoole\Consul\Request\Catalog\DeRegister;
use EasySwoole\Consul\Request\Catalog\Node;
use EasySwoole\Consul\Request\Catalog\Nodes;
use EasySwoole\Consul\Request\Catalog\Register;
use EasySwoole\Consul\Request\Catalog\Service;
use EasySwoole\Consul\Request\Catalog\Services;

class Catalog extends AbstractEndpoint implements CatalogInterface
{

    /**
     * Register Entity
     * @param Register $register
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function register(Register $register): mixed
    {
        if (empty($register->getNode())) {
            throw new MissingRequiredParameterException('Missing the required param: Node.');
        }
        if (empty($register->getAddress())) {
            throw new MissingRequiredParameterException('Missing the required param: Address.');
        }
        return $this->putJson($register);
    }

    /**
     * Deregister Entity
     * @param DeRegister $deregister
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deRegister(DeRegister $deregister): mixed
    {
        if (empty($deregister->getNode())) {
            throw new MissingRequiredParameterException('Missing the required param: Node.');
        }
        return $this->putJson($deregister);
    }

    /**
     * List Datacenters
     * @param Datacenters $datacenters
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function dataCenters(DataCenters $datacenters): mixed
    {
        return $this->getJson($datacenters);
    }

    /**
     * List Nodes
     * @param Nodes $nodes
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function nodes(Nodes $nodes): mixed
    {
        return $this->getJson($nodes);
    }

    /**
     * List Services
     * @param Services $services
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function services(Services $services): mixed
    {
        return $this->getJson($services);
    }

    /**
     * List Nodes for service
     * @param Service $service
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function service(Service $service): mixed
    {
        if (empty($service->getService())) {
            throw new MissingRequiredParameterException('Missing the required param: service.');
        }
        $service->setUrl(sprintf($service->getUrl(), rawurlencode($service->getService())));
        $service->setService('');
        return $this->getJson($service);
    }

    /**
     * List Nodes for Connect-capable Service
     * @param Connect $connect
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function connect(Connect $connect): mixed
    {
        if (empty($connect->getService())) {
            throw new MissingRequiredParameterException('Missing the required param: service.');
        }
        $connect->setUrl(sprintf($connect->getUrl(), rawurlencode($connect->getService())));
        $connect->setService('');
        return $this->getJson($connect);
    }

    /**
     * List Services for Node
     * @param Node $node
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function node(Node $node): mixed
    {
        if (empty($node->getNode())) {
            throw new MissingRequiredParameterException('Missing the required param: node.');
        }
        $node->setUrl(sprintf($node->getUrl(), rawurlencode($node->getNode())));
        $node->setNode('');
        return $this->getJson($node);
    }
}
