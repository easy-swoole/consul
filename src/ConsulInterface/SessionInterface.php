<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:41
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Session\Create;
use EasySwoole\Consul\Request\Session\Destroy;
use EasySwoole\Consul\Request\Session\Info;
use EasySwoole\Consul\Request\Session\Node;
use EasySwoole\Consul\Request\Session\Renew;
use EasySwoole\Consul\Request\Session\SessionList;

interface SessionInterface
{
    public function create(Create $create): mixed;

    public function destroy(Destroy $destroy): mixed;

    public function info(Info $info): mixed;

    public function node(Node $node): mixed;

    public function sessionList(SessionList $sessionList): mixed;

    public function renew(Renew $renew): mixed;
}
