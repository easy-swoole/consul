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
    public function members(Members $members): mixed;

    public function self(SelfParams $params): mixed;

    public function reload(Reload $reload): mixed;

    public function maintenance(Maintenance $maintenance): mixed;

    public function metrics(Metrics $metrics): mixed;

    public function monitor(Monitor $monitor): mixed;

    public function join(Join $join): mixed;

    public function leave(Leave $leave): mixed;

    public function forceLeave(ForceLeave $leave): mixed;

    public function token(Token $token): mixed;

    public function checks(Checks $checks): mixed;

    public function register(Register $register): mixed;

    public function deRegister(DeRegister $register): mixed;

    public function pass(Pass $pass): mixed;

    public function warn(Warn $warn): mixed;

    public function fail(Fail $fail): mixed;

    public function update(Update $update): mixed;

    public function services(Services $services): mixed;

    public function service(Service $service): mixed;

    public function name(Name $name): mixed;

    public function id(ID $ID): mixed;

    public function serviceRegister(Service\Register $register): mixed;

    public function serviceDeregister(Service\DeRegister $deRegister): mixed;

    public function serviceMaintenance(Service\Maintenance $maintenance): mixed;

    public function authorize(Authorize $authorize): mixed;

    public function roots(Roots $roots): mixed;

    public function leaf(Leaf $leaf): mixed;
}
