<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\HealthInterface;
use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Health\Checks;
use EasySwoole\Consul\Request\Health\Connect;
use EasySwoole\Consul\Request\Health\Node;
use EasySwoole\Consul\Request\Health\Service;
use EasySwoole\Consul\Request\Health\State;

class Health extends BaseFunc implements HealthInterface
{
    /**
     * List Checks for Node
     * @param Node $node
     * @return mixed
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
        return $this->getJson($node);
    }

    /**
     * List Checks for Service
     * @param Checks $checks
     * @return mixed
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
        return $this->getJson($checks);
    }

    /**
     * List Nodes for Service
     * @param Service $service
     * @return mixed
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
        return $this->getJson($service);
    }

    /**
     * List Nodes for Connect-capable Service
     * Parameters and response format are the same as Health/service
     * @param Connect $connect
     * @return mixed
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
        return $this->getJson($connect);
    }

    /**
     * List Checks in State
     * @param State $state
     * @return mixed
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
        return $this->getJson($state);
    }
}