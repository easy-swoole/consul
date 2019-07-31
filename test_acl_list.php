<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午12:15
 */
namespace test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Acl\Lists;
require_once 'vendor/autoload.php';

go(function (){

    $consul = new Consul(new Config());
    $lists = new Lists();
    $consul->acl()->getList($lists);

});