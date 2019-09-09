<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\MissingRequiredParamsException;
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
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function node(Node $node)
    {
        if (empty($node->getNode())) {
            throw new MissingRequiredParamsException('Missing the required param: node.');
        }
        $node->setUrl(sprintf($node->getUrl(), $node->getNode()));
        $node->setNode('');
        $this->getJson($node);
    }

    /**
     * List Checks for Service
     * @param Checks $checks
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function checks(Checks $checks)
    {
        if (empty($checks->getService())) {
            throw new MissingRequiredParamsException('Missing the required param: service.');
        }
        $checks->setUrl(sprintf($checks->getUrl(), $checks->getService()));
        $checks->setService('');
        $this->getJson($checks);
    }

    /**
     * List Nodes for Service
     * @param Service $service
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function service(Service $service)
    {
        if (empty($service->getService())) {
            throw new MissingRequiredParamsException('Missing the required param: service.');
        }
        $service->setUrl(sprintf($service->getUrl(), $service->getService()));
        $service->setService('');
        $this->getJson($service);
    }

    /**
     * List Nodes for Connect-capable Service
     * Parameters and response format are the same as Health/service
     * @param Connect $connect
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function connect(Connect $connect)
    {
        if (empty($connect->getService())) {
            throw new MissingRequiredParamsException('Missing the required param: service.');
        }
        $connect->setUrl(sprintf($connect->getUrl(), $connect->getService()));
        $connect->setService('');
        $this->getJson($connect);
    }

    /**
     * List Checks in State
     * @param State $state
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function state(State $state)
    {
        if (empty($state->getState())) {
            throw new MissingRequiredParamsException('Missing the required param: state.');
        }
        $state->setUrl(sprintf($state->getUrl(), $state->getState()));
        $state->setState('');
        $this->getJson($state);
    }
}