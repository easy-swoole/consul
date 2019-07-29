<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Agent\Check\Deregister;
use EasySwoole\Consul\Request\Agent\Check\Fail;
use EasySwoole\Consul\Request\Agent\Check\Pass;
use EasySwoole\Consul\Request\Agent\Check\Register;
use EasySwoole\Consul\Request\Agent\Check\Update;
use EasySwoole\Consul\Request\Agent\Check\Warn;
use EasySwoole\Consul\Request\Agent\Checks;
use EasySwoole\Consul\Request\Agent\ForceLeave;
use EasySwoole\Consul\Request\Agent\Join;
use EasySwoole\Consul\Request\Agent\Leave;
use EasySwoole\Consul\Request\Agent\Maintenance;
use EasySwoole\Consul\Request\Agent\Members;
use EasySwoole\Consul\Request\Agent\Metrics;
use EasySwoole\Consul\Request\Agent\Monitor;
use EasySwoole\Consul\Request\Agent\Reload;
use EasySwoole\Consul\Request\Agent\SelfAction;
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
     * @param SelfAction $selfAction
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function self(SelfAction $selfAction)
    {
        $this->getJson($selfAction);
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
        $this->putJSON($maintenance);
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
        if (!empty($join->getAddress())) {
            $action = $join->getAddress();
            $join->setAddress('');
        } else {
            echo "Lack of parameters: address";
            return false;
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
    public function force_leave(ForceLeave $forceLeave)
    {
        if (!empty($forceLeave->getNode())) {
            $action = $forceLeave->getNode();
            $forceLeave->setNode('');
        } else {
            echo "Lack of parameters: node";
            return false;
        }
        $this->putJSON($forceLeave, $action);
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
        if (!empty($deregister->getCheckId())) {
            $action = $deregister->getCheckId();
            $deregister->setCheckId('');
        } else {
            echo "Lack of parameters: check_id";
            return false;
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
        if (!empty($pass->getCheckId())) {
            $action = $pass->getCheckId();
            $pass->setCheckId('');
        } else {
            echo "Lack of parameters: check_id";
            return false;
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
        if (!empty($warn->getCheckId())) {
            $action = $warn->getCheckId();
            $warn->setCheckId('');
        } else {
            echo "Lack of parameters: check_id";
            return false;
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
        if (!empty($fail->getCheckId())) {
            $action = $fail->getCheckId();
            $fail->setCheckId('');
        } else {
            echo "Lack of parameters: check_id";
            return false;
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
            echo "Lack of parameters: check_id";
            return false;
        }
        $this->putJSON($update, $action);
    }

    /**
     * @param Services $services
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function services(Services $services)
    {
        $this->getJson($services);
    }

    /**
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
            echo "Lack of parameters: service_id";
            return false;
        }
        $this->getJson($service, $action);
    }
}