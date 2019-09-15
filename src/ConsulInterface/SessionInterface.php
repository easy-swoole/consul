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
    public function create(Create $create);

    public function destroy(Destroy $destroy);

    public function info(Info $info);

    public function node(Node $node);

    public function sessionList(SessionList $sessionList);

    public function renew(Renew $renew);
}