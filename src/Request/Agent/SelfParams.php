<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class SelfParams extends BaseCommand
{
    protected $url = 'agent/self';
}
