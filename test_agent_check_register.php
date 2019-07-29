<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/28
 * Time: 下午7:46
 */
namespace test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Agent\Check\Register;
use EasySwoole\Consul\Request\Catalog\Datacenters;

require_once 'vendor/autoload.php';
go(function (){

    $consul = new Consul(new Config());

    $consul->agent()->register(new Register());

});