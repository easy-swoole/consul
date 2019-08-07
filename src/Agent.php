<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\Exception;
use EasySwoole\Consul\Request\Agent\Check\Deregister;
use EasySwoole\Consul\Request\Agent\Check\Fail;
use EasySwoole\Consul\Request\Agent\Check\Pass;
use EasySwoole\Consul\Request\Agent\Check\Register;
use EasySwoole\Consul\Request\Agent\Check\Update;
use EasySwoole\Consul\Request\Agent\Check\Warn;
use EasySwoole\Consul\Request\Agent\Checks;
use EasySwoole\Consul\Request\Agent\Connect\Authorize;
use EasySwoole\Consul\Request\Agent\Connect\Ca\Leaf;
use EasySwoole\Consul\Request\Agent\Connect\Ca\Roots;
use EasySwoole\Consul\Request\Agent\Connect\Proxy;
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

class Agent extends BaseFunc
{
    /**
     * List Members
     * @param Members $members
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function members(Members $members)
    {
        $this->getJson($members);
    }

    /**
     * Read Configuration
     * returns the configuration and member information of the local agent
     * @param SelfParams $selfParams
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function self(SelfParams $selfParams)
    {
        $beanRoute = new \ReflectionClass($selfParams);
        if (empty($beanRoute)) {
            throw new \ReflectionException(static::class);
        }
        $route = substr($beanRoute->name, strpos($beanRoute->name,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = substr($route, 0, strripos($route,'\\') + 1);
        $route .= 'self';
        $route = strtolower(str_replace('\\','/',$route));
        $useRef = [
            'reflection' => true,
            'url' => $this->route.$route,
        ];
        $this->getJson($selfParams,'',true, $useRef);
    }

    /**
     * reload configuration
     * Not all configuration options are reloadable
     * @param Reload $reload
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function reload(Reload $reload)
    {
        $this->putJSON($reload);
    }

    /**
     * places the agent into "maintenance mode"
     * @param Maintenance $maintenance
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function maintenance(Maintenance $maintenance)
    {
        $this->putJSON($maintenance,'',true,[],true);
    }

    /**
     * dump the metrics for the most recent finished interval
     * if format be set,the format set prometheus automatically,
     * and the return is text/plain; version=0.0.4; charset=utf-8
     * @param Metrics $metrics
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function metrics(Metrics $metrics)
    {
        if (!empty($metrics->getFormat())) {
            $metrics->setFormat('prometheus');
        } else {
            $metrics->setFormat('');
        }
        $this->getJson($metrics);
    }

    /**
     * Stream Logs
     * @param Monitor $monitor
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function monitor(Monitor $monitor)
    {
        $this->getJson($monitor);
    }

    /**
     * Join Agent
     * @param Join $join
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function join(Join $join)
    {
        $action = '';
        if (!empty($join->getAddress())) {
            $action = $join->getAddress();
            $join->setAddress('');
        }
        $this->putJSON($join, $action);
    }

    /**
     * graceful leave and shutdown of the agent
     * @param Leave $leave
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function leave(Leave $leave)
    {
        $this->putJSON($leave);
    }

    /**
     * Force Leave and Shutdown
     * @param ForceLeave $forceLeave
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function forceLeave(ForceLeave $forceLeave)

    {
        if (!empty($forceLeave->getNode())) {
            $action = $forceLeave->getNode();
            $forceLeave->setNode('');
        } else{
            $action = '';
        }
        return $this->putJSON($forceLeave, $action);
    }

    /**
     * Update ACL Tokens
     * @param Token $token
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function token(Token $token)
    {
        switch ($token->getAction()) {
            case 'default':
                break;
            case 'agent':
                break;
            case 'agent_master':
                break;
            case 'replication':
                break;
            case 'acl_token':
                break;
            case 'acl_agent_token':
                break;
            case 'acl_agent_master_token':
                break;
            case 'acl_replication_token':
                break;
            default:
                $token->setAction('default');
                break;
        }
        $action = $token->getAction();
        $token->setAction('');
        $this->putJSON($token, $action);
    }

    /**
     * List Checks
     * @param Checks $checks
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function checks(Checks $checks)
    {
        $this->getJson($checks);
    }

    /**
     * Register Check
     * @param Register $register
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function register(Register $register)
    {
        $this->putJSON($register);
    }

    /**
     * Deregister Check
     * @param Deregister $deregister
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deRegister(Deregister $deregister)
    {
        $action = '';
        if (!empty($deregister->getCheckId())) {
            $action = $deregister->getCheckId();
            $deregister->setCheckId('');
        }
        $this->putJSON($deregister, $action);
    }

    /**
     * TTL Check Pass
     * @param Pass $pass
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function pass(Pass $pass)
    {
        $action = '';
        if (!empty($pass->getCheckId())) {
            $action = $pass->getCheckId();
            $pass->setCheckId('');
        }
        $this->putJSON($pass, $action);
    }

    /**
     * TTL Check Warn
     * @param Warn $warn
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function warn(Warn $warn)
    {
        $action = '';
        if (!empty($warn->getCheckId())) {
            $action = $warn->getCheckId();
            $warn->setCheckId('');
        }
        $this->putJSON($warn, $action);
    }

    /**
     * TTL Check Fail
     * @param Fail $fail
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function fail(Fail $fail)
    {
        $action = '';
        if (!empty($fail->getCheckId())) {
            $action = $fail->getCheckId();
            $fail->setCheckId('');
        }
        $this->putJSON($fail, $action);
    }

    /**
     * TTL Check Update
     * @param Update $update
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function update(Update $update)
    {
        if (!empty($update->getCheckId())) {
            $action = $update->getCheckId();
            $update->setCheckId('');
        } else {
            $action = '';
        }
        $this->putJSON($update, $action);
    }

    /**
     * List Services
     * @param Services $services
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function services(Services $services)
    {
        $this->getJson($services);
    }

    /**
     * Get Service Configuration
     * @param Service $service
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function service(Service $service)
    {
        if (!empty($service->getServiceId())) {
            $action = $service->getServiceId();
            $service->setServiceId('');
        } else {
            $action = '';
        }
        $this->getJson($service, $action);
    }

    /**
     * Get local service health by its name
     * @param Name $name
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function name(Name $name)
    {
        if (!empty($name->getServiceName())) {
            $action = $name->getServiceName();
            $name->setServiceName('');
        } else {
            $action = '';
        }
        $this->getJson($name, $action);
    }

    /**
     * Get local service health by its ID
     * @param ID $ID
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function id(ID $ID)
    {
        if (!empty($ID->getServiceID())) {
            $action = $ID->getServiceID();
            $ID->setServiceID('');
        } else {
            $action = '';
        }
        $this->getJson($ID, $action);
    }

    /**
     * Register Service
     * @param Register $register
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function serviceRegister(Service\Register $register)
    {
        $this->putJSON($register);
    }

    /**
     * Deregister Service
     * @param Deregister $deregister
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function serviceDeregister(Service\Deregister $deregister)
    {
        $this->putJSON($deregister);
    }

    /**
     * Enable Maintenance Mode
     * @param Maintenance $maintenance
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function serviceMaintenance(Maintenance $maintenance)
    {
        $this->putJSON($maintenance);
    }

    /**
     * Authorize
     * @param Authorize $authorize
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function authorize(Authorize $authorize)
    {
        $this->postJson($authorize);
    }

    /**
     * Certificate Authority (CA) Roots
     * @param Roots $roots
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function roots(Roots $roots)
    {
        $this->getJson($roots);
    }

    /**
     * Service Leaf Certificate
     * @param Leaf $leaf
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function leaf(Leaf $leaf)
    {
        if (!empty($leaf->getService())) {
            $action = $leaf->getService();
            $leaf->setService('');
        } else {
            $action = '';
        }
        $this->getJson($leaf, $action);
    }

    /**
     * Managed Proxy Configuration (Deprecated)
     * @param Proxy $proxy
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function proxy(Proxy $proxy)
    {
        if (!empty($proxy->getID())) {
            $action = $proxy->getID();
            $proxy->setID('');
        } else {
            $action = '';
        }
        $this->getJson($proxy, $action);
    }
}