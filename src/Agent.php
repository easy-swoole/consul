<?php
namespace EasySwoole\Consul;

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
use EasySwoole\Consul\Request\Agent\Token;

class Agent extends BaseFunc
{
    /**
     * @var bool|string
     */
    private $class;

    /**
     * Agent constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->route = $config->__toString();
        $this->class = substr(self::class, strripos(self::class,'\\') + 1);
    }

    /**
     * List Members
     * @param Members $members
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function members(Members $members)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->getJson($members);
    }

    /**
     * Read Configuration
     * returns the configuration and member information of the local agent
     * @param SelfAction $selfAction
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function self(SelfAction $selfAction)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->getJson($selfAction);
    }

    /**
     * reload configuration
     * Not all configuration options are reloadable
     * @param Reload $reload
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function reload(Reload $reload)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->putJSON($reload);
    }

    /**
     * places the agent into "maintenance mode"
     * @param Maintenance $maintenance
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function maintenance(Maintenance $maintenance)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->putJSON($maintenance);
    }

    /**
     * dump the metrics for the most recent finished interval
     * if format be set,the format set prometheus automatically,
     * and the return is text/plain; version=0.0.4; charset=utf-8
     * @param Metrics $metrics
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function metrics(Metrics $metrics)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
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
     */
    public function monitor(Monitor $monitor)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->getJson($monitor);
    }

    /**
     * Join Agent
     * @param Join $join
     * @return bool
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function join(Join $join)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__);
        if (!empty($join->getAddress())) {
            $this->route .= '/' . $join->getAddress();
            $join->setAddress('');
        } else {
            echo "Lack of parameters: address";
            return false;
        }
        $this->putJSON($join);
    }

    /**
     * graceful leave and shutdown of the agent
     * @param Leave $leave
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function leave(Leave $leave)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->putJSON($leave);
    }

    /**
     * Force Leave and Shutdown
     * @param ForceLeave $forceLeave
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function force_leave(ForceLeave $forceLeave)
    {
        $func = str_replace('_','-',__FUNCTION__);
        $this->route .= strtolower($this->class) . '/' . strtolower($func );
        if (!empty($forceLeave->getNode())) {
            $this->route .= '/' . $forceLeave->getNode();
            $forceLeave->setNode('');
        } else {
            echo "Lack of parameters: node";
            return false;
        }
        $this->putJSON($forceLeave);
    }

    /**
     * Update ACL Tokens
     * @param Token $token
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function token(Token $token)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
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
        $this->route .= '/' . $token->getAction();
        $token->setAction('');
        $this->putJSON($token);
    }

    /**
     * List Checks
     * @param Checks $checks
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function checks(Checks $checks)
    {
        $this->route .= strtolower($this->class) . '/' . strtolower(__FUNCTION__ );
        $this->getJson($checks);
    }
}