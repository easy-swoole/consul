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
     * @var bool|string
     */
    private $class;

    /**
     * Catalog constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->route = $config->__toString();
        $this->class = substr(self::class, strripos(self::class,'\\') + 1);
    }

    /**
     * Register Entity
     * @param Register $register
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function register(Register $register)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->putJSON($register);
    }

    /**
     * Deregister Entity
     * @param Deregister $deregister
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deRegister(Deregister $deregister)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->putJSON($deregister);
    }

    /**
     * List Datacenters
     * @param Datacenters $datacenters
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function dataCenters(Datacenters $datacenters)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->getJson($datacenters);
    }

    /**
     * List Nodes
     * @param Nodes $nodes
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function nodes(Nodes $nodes)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        $this->getJson($nodes);
    }

    /**
     * List Services
     * @param Services $services
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function services(Services $services)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        $this->getJson($services);
    }

    /**
     * List Nodes for service
     * @param Service $service
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function service(Service $service)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        if (!empty($service->getService())) {
            $this->route .= '/' . $service->getService();
            $service->setService('');
        } else {
            echo "Lack of parameters: service";
            return false;
        }
        $this->getJson($service);
    }

    /**
     * List Nodes for Connect-capable Service
     * Parameters and response format are the same as service
     * @param Connect $connect
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function connect(Connect $connect)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        if (!empty($connect->getService())) {
            $this->route .= '/' . $connect->getService();
            $connect->setService('');
        } else {
            echo "Lack of parameters: service";
            return false;
        }
        $this->getJson($connect);
    }

    /**
     * List Services for Node
     * @param Node $node
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function node(Node $node)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        if (!empty($node->getNode())) {
            $this->route .= '/' . $node->getNode();
            $node->setNode('');
        } else {
            echo "Lack of parameters: node";
            return false;
        }
        $this->getJson($node);
    }
}