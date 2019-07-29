<?php


namespace EasySwoole\Consul;


use EasySwoole\Consul\Request\Health\Checks;
use EasySwoole\Consul\Request\Health\Connect;
use EasySwoole\Consul\Request\Health\Node;
use EasySwoole\Consul\Request\Health\Service;
use EasySwoole\Consul\Request\Health\State;

class Health extends BaseFunc
{
    /**
     * @var bool|string
     */
    private $class;

    /**
     * Health constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->route = $config->__toString();
        $this->class = substr(self::class, strripos(self::class,'\\') + 1);
    }

    /**
     * List Checks for Node
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

    /**
     * List Checks for Service
     * @param Checks $checks
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function checks(Checks $checks)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        if (!empty($checks->getService())) {
            $this->route .= '/' . $checks->getService();
            $checks->setService('');
        } else {
            echo "Lack of parameters: service";
            return false;
        }
        $this->getJson($checks);
    }

    /**
     * List Nodes for Service
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
     * Parameters and response format are the same as Health/service
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
     * List Checks in State
     * @param State $state
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function state(State $state)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        if (!empty($state->getState())) {
            $this->route .= '/' . $state->getState();
            $state->setState('any'); // Default 'any', if not state.
        } else {
            echo "Lack of parameters: state";
            return false;
        }
        $this->getJson($state);
    }
}