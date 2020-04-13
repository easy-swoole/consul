<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午9:15
 */
namespace EasySwoole\Consul\ConsulInterface;

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

interface AgentInterface
{
    public function members(Members $members);

    public function self(SelfParams $params);

    public function reload(Reload $reload);

    public function maintenance(Maintenance $maintenance);

    public function metrics(Metrics $metrics);

    public function monitor(Monitor $monitor);

    public function join(Join $join);

    public function leave(Leave $leave);

    public function forceLeave(ForceLeave $leave);

    public function token(Token $token);

    public function checks(Checks $checks);

    public function register(Register $register);

    public function deRegister(DeRegister $register);

    public function pass(Pass $pass);

    public function warn(Warn $warn);

    public function fail(Fail $fail);

    public function update(Update $update);

    public function services(Services $services);

    public function service(Service $service);

    public function name(Name $name);

    public function id(ID $ID);

    public function serviceRegister(Service\Register $register);

    public function serviceDeregister(Service\DeRegister $deRegister);

    public function serviceMaintenance(Service\Maintenance $maintenance);

    public function authorize(Authorize $authorize);

    public function roots(Roots $roots);

    public function leaf(Leaf $leaf);
}
