<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 下午8:00
 */
namespace test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Acl\Token\CloneToken;
require_once 'vendor/autoload.php';

go(function (){

    $consul = new Consul(new Config());
    $cloneToken = new CloneToken([
        'AccessorID' => 'a'
    ]);
    $acl = $consul->acl();
    $acl->cloneToken($cloneToken);

});