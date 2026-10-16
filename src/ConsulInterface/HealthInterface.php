<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:56
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Health\Checks;
use EasySwoole\Consul\Request\Health\Connect;
use EasySwoole\Consul\Request\Health\Node;
use EasySwoole\Consul\Request\Health\Service;
use EasySwoole\Consul\Request\Health\State;

interface HealthInterface
{
    public function node(Node $node): mixed;

    public function checks(Checks $checks): mixed;

    public function service(Service $service): mixed;

    public function connect(Connect $connect): mixed;

    public function state(State $state): mixed;
}
