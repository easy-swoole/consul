<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/7
 * Time: 下午1:28
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class Policies extends BaseCommand
{
    protected $url = 'acl/policies';
}