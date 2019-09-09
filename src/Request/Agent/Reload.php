<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Reload extends BaseCommand
{
    protected $url = 'agent/reload';
}