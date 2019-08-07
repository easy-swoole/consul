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
        $action = '';
        if (!empty($node->getNode())) {
            $action = $node->getNode();
            $node->setNode('');
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
        $action = '';
        if (!empty($checks->getService())) {
            $action = $checks->getService();
            $checks->setService('');
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
        $action = '';
        if (!empty($service->getService())) {
            $action = $service->getService();
            $service->setService('');
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
        $action = '';
        if (!empty($connect->getService())) {
            $action = $connect->getService();
            $connect->setService('');
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
        $action = '';
        if (!empty($state->getState())) {
            $action = $state->getState();
            $state->setState('any'); // Default 'any', if not state.
        }
        $this->getJson($state, $action);
    }
}