<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Leave extends BaseCommand
{
    protected $url = 'agent/leave';
}
