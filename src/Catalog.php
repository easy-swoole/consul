<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Catalog\Datacenters;
use EasySwoole\Consul\Request\Catalog\Deregister;
use EasySwoole\Consul\Request\Catalog\Nodes;

use EasySwoole\Consul\Request\Catalog\Register;

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
        $this->class = substr(__CLASS__, strripos(__CLASS__,'\\') + 1);
    }

    /**
     * @param Register $register
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function register(Register $register)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->putJSON($register);
    }
    /**
     * @param Deregister $deregister
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deRegister(Deregister $deregister)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->putJSON($deregister);
    }

    /**
     * @param Datacenters $datacenters
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function dataCenters(Datacenters $datacenters)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->getJson($datacenters);
    }

    /**
     * @param Nodes $nodes
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function nodes(Nodes $nodes)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        $this->getJson($nodes);
    }
}