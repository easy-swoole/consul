<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:59
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Event\Fire;
use EasySwoole\Consul\Request\Event\ListEvent;

interface EventInterface
{
    public function fire(Fire $fire);

    public function listEvent(ListEvent $listEvent);
}
