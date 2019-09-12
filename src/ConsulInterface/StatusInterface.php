<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:28
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Status\Leader;
use EasySwoole\Consul\Request\Status\Peers;

interface StatusInterface
{
    public function leader (Leader $leader);

    public function peers(Peers $peers);
}