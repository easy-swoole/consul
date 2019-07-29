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
     * List Checks for Node
     * @param Node $node
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
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

    /**
     * List Checks for Service
     * @param Checks $checks
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function checks(Checks $checks)
    {
        if (!empty($checks->getService())) {
            $action = $checks->getService();
            $checks->setService('');
        } else {
            echo "Lack of parameters: service";
            return false;
        }
        $this->getJson($checks, $action);
    }

    /**
     * List Nodes for Service
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
     * Parameters and response format are the same as Health/service
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
     * List Checks in State
     * @param State $state
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function state(State $state)
    {
        if (!empty($state->getState())) {
            $action = $state->getState();
            $state->setState('any'); // Default 'any', if not state.
        } else {
            echo "Lack of parameters: state";
            return false;
        }
        $this->getJson($state, $action);
    }
}