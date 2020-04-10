<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\AgentInterface;
use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Exception\InvalidRequiredParamsException;
use EasySwoole\Consul\Request\Agent\Check\DeRegister;
use EasySwoole\Consul\Request\Agent\Check\Fail;
use EasySwoole\Consul\Request\Agent\Check\Pass;
use EasySwoole\Consul\Request\Agent\Check\Register;
use EasySwoole\Consul\Request\Agent\Check\Update;
use EasySwoole\Consul\Request\Agent\Check\Warn;
use EasySwoole\Consul\Request\Agent\Checks;
use EasySwoole\Consul\Request\Agent\Connect\Authorize;
use EasySwoole\Consul\Request\Agent\Connect\Ca\Leaf;
use EasySwoole\Consul\Request\Agent\Connect\Ca\Roots;
use EasySwoole\Consul\Request\Agent\ForceLeave;
use EasySwoole\Consul\Request\Agent\Health\Service\ID;
use EasySwoole\Consul\Request\Agent\Health\Service\Name;
use EasySwoole\Consul\Request\Agent\Join;
use EasySwoole\Consul\Request\Agent\Leave;
use EasySwoole\Consul\Request\Agent\Maintenance;
use EasySwoole\Consul\Request\Agent\Members;
use EasySwoole\Consul\Request\Agent\Metrics;
use EasySwoole\Consul\Request\Agent\Monitor;
use EasySwoole\Consul\Request\Agent\Reload;
use EasySwoole\Consul\Request\Agent\SelfParams;
use EasySwoole\Consul\Request\Agent\Service;
use EasySwoole\Consul\Request\Agent\Services;
use EasySwoole\Consul\Request\Agent\Token;

class Agent extends BaseFunc implements AgentInterface
{
    /**
     * List Members
     * @param Members $members
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function members(Members $members)
    {
        return $this->getJson($members);
    }

    /**
     * Read Configuration
     * @param SelfParams $selfParams
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function self(SelfParams $selfParams)
    {
        return $this->getJson($selfParams);
    }

    /**
     * reload configuration
     * @param Reload $reload
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function reload(Reload $reload)
    {
        return $this->putJSON($reload);
    }

    /**
     * Enable Maintenance Mode
     * @param Maintenance $maintenance
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function maintenance(Maintenance $maintenance)
    {
        if (empty($maintenance->getEnable())) {
            throw new MissingRequiredParamsException('Missing the required param: enable.');
        }
        return $this->putJSON($maintenance , false);
    }

    /**
     * dump the metrics for the most recent finished interval
     * if format be set,the format set prometheus automatically,
     * and the return is text/plain; version=0.0.4; charset=utf-8
     * @param Metrics $metrics
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function metrics(Metrics $metrics)
    {
        return $this->getJson($metrics);
    }

    /**
     * Stream Logs
     * @param Monitor $monitor
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function monitor(Monitor $monitor)
    {
        return $this->getJson($monitor);
    }

    /**
     * Join Agent
     * @param Join $join
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function join(Join $join)
    {
        if (empty($join->getAddress())) {
            throw new MissingRequiredParamsException('Missing the required param: address.');
        }
        $join->setUrl(sprintf($join->getUrl(), $join->getAddress()));
        $join->setAddress('');
        return $this->putJSON($join);
    }

    /**
     * graceful leave and shutdown of the agent
     * @param Leave $leave
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function leave(Leave $leave)
    {
        return $this->putJSON($leave);
    }

    /**
     * Force Leave and Shutdown
     * @param ForceLeave $forceLeave
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function forceLeave(ForceLeave $forceLeave)

    {
        if (empty($forceLeave->getNode())) {
            throw new MissingRequiredParamsException('Missing the required param: node.');
        }
        $forceLeave->setUrl(sprintf($forceLeave->getUrl(), $forceLeave->getNode()));
        $forceLeave->setNode('');
        return $this->putJSON($forceLeave);
    }

    /**
     * Update ACL Tokens
     * @param Token $token
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws InvalidRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function token(Token $token)
    {
        $actionArr = [
            'default',
            'agent',
            'agent_master',
            'replication',
            'acl_token',
            'acl_agent_token',
            'acl_agent_master_token',
            'acl_replication_token',
        ];
        if (empty($token->getAction())) {
            throw new MissingRequiredParamsException('Missing the required param: action');
        }
        if (! in_array(strtolower(trim($token->getAction())), $actionArr)) {
            throw new InvalidRequiredParamsException('Wrong required param: action');
        }
        $token->setUrl(sprintf($token->getUrl(), $token->getAction()));
        $token->setAction('');
        return $this->putJSON($token);
    }

    /**
     * List Checks
     * @param Checks $checks
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function checks(Checks $checks)
    {
        return $this->getJson($checks);
    }

    /**
     * Register Check
     * @param Register $register
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function register(Register $register)
    {
        if (empty($register->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        if (empty($register->getTTL())) {
            throw new MissingRequiredParamsException('Missing the required param: TTL.');
        }
        return $this->putJSON($register);
    }

    /**
     * Deregister Check
     * @param DeRegister $deregister
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deRegister(DeRegister $deregister)
    {
        if (empty($deregister->getCheckId())) {
            throw new MissingRequiredParamsException('Missing the required param: check_id.');
        }
        $deregister->setUrl(sprintf($deregister->getUrl(), $deregister->getCheckId()));
        $deregister->setCheckId('');
        return $this->putJSON($deregister);
    }

    /**
     * TTL Check Pass
     * @param Pass $pass
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function pass(Pass $pass)
    {
        if (empty($pass->getCheckId())) {
            throw new MissingRequiredParamsException('Missing the required param: check_id.');
        }
        $pass->setUrl(sprintf($pass->getUrl(), $pass->getCheckId()));
        $pass->setCheckId('');
        return $this->putJSON($pass);
    }

    /**
     * TTL Check Warn
     * @param Warn $warn
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function warn(Warn $warn)
    {
        if (empty($warn->getCheckId())) {
            throw new MissingRequiredParamsException('Missing the required param: check_id.');
        }
        $warn->setUrl(sprintf($warn->getUrl(), $warn->getCheckId()));
        $warn->setCheckId('');
        return $this->putJSON($warn);
    }

    /**
     * TTL Check Fail
     * @param Fail $fail
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function fail(Fail $fail)
    {
        if (empty($fail->getCheckId())) {
            throw new MissingRequiredParamsException('Missing the required param: check_id.');
        }
        $fail->setUrl(sprintf($fail->getUrl(), $fail->getCheckId()));
        $fail->setCheckId('');
        return $this->putJSON($fail);
    }

    /**
     * TTL Check Update
     * @param Update $update
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function update(Update $update)
    {
        if (empty($update->getCheckId())) {
            throw new MissingRequiredParamsException('Missing the required param: check_id.');
        }
        $update->setUrl(sprintf($update->getUrl(), $update->getCheckId()));
        $update->setCheckId('');
        return $this->putJSON($update);
    }

    /**
     * List Services
     * @param Services $services
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function services(Services $services)
    {
        return $this->getJson($services);
    }

    /**
     * Get Service Configuration
     * @param Service $service
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function service(Service $service)
    {
        if (empty($service->getServiceId())) {
            throw new MissingRequiredParamsException('Missing the required param: service_id.');
        }
        $service->setUrl(sprintf($service->getUrl(), $service->getServiceId()));
        $service->setServiceId('');
        return $this->getJson($service);
    }

    /**
     * Get local service health by its name
     * @param Name $name
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function name(Name $name)
    {
        if (empty($name->getServiceName())) {
            throw new MissingRequiredParamsException('Missing the required param: service_name.');
        }
        $name->setUrl(sprintf($name->getUrl(), $name->getServiceName()));
        $name->setServiceName('');
        return $this->getJson($name);
    }

    /**
     * Get local service health by its ID
     * @param ID $ID
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function id(ID $ID)
    {
        if (empty($ID->getServiceID())) {
            throw new MissingRequiredParamsException('Missing the required param: service_id.');
        }
        $ID->setUrl(sprintf($ID->getUrl(), $ID->getServiceID()));
        $ID->setServiceID('');
        return $this->getJson($ID);
    }

    /**
     * Register Service
     * @param Service\Register $register
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function serviceRegister(Service\Register $register)
    {
        if (empty($register->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        return $this->putJSON($register);
    }

    /**
     * Deregister Service
     * @param Service\DeRegister $deregister
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function serviceDeregister(Service\DeRegister $deregister)
    {
        if (empty($deregister->getServiceID())) {
            throw new MissingRequiredParamsException('Missing the required param: service_id.');
        }
        $deregister->setUrl(sprintf($deregister->getUrl(), $deregister->getServiceID()));
        $deregister->setServiceID('');
        return $this->putJSON($deregister);
    }

    /**
     * Enable Maintenance Mode
     * @param Service\Maintenance $maintenance
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function serviceMaintenance(Service\Maintenance $maintenance)
    {
        if (empty($maintenance->getServiceID())) {
            throw new MissingRequiredParamsException('Missing the required param: service_id.');
        }
        if ($maintenance->getEnable() === '' || $maintenance->getEnable() === null) {
            throw new MissingRequiredParamsException('Missing the required param: enable.');
        }
        $maintenance->setUrl(sprintf($maintenance->getUrl(), $maintenance->getServiceID()));
        $maintenance->setServiceID('');
        return $this->putJSON($maintenance);
    }

    /**
     * Authorize
     * @param Authorize $authorize
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function authorize(Authorize $authorize)
    {
        if (empty($authorize->getTarget())) {
            throw new MissingRequiredParamsException('Missing the required param: Target.');
        }
        if (empty($authorize->getClientCertURI())) {
            throw new MissingRequiredParamsException('Missing the required param: ClientCertURI.');
        }
        if (empty($authorize->getClientCertSerial())) {
            throw new MissingRequiredParamsException('Missing the required param: ClientCertSerial.');
        }
        return $this->postJson($authorize);
    }

    /**
     * Certificate Authority (CA) Roots
     * @param Roots $roots
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function roots(Roots $roots)
    {
        return $this->getJson($roots);
    }

    /**
     * Service Leaf Certificate
     * @param Leaf $leaf
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function leaf(Leaf $leaf)
    {
        if (empty($leaf->getService())) {
            throw new MissingRequiredParamsException('Missing the required param: service.');
        }
        $leaf->setUrl(sprintf($leaf->getUrl(), $leaf->getService()));
        $leaf->setService('');
        return $this->getJson($leaf);
    }
}