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
use EasySwoole\Consul\Request\Config as consulConfig;
require_once 'vendor/autoload.php';

go(function (){
    $consul = new Consul(new Config());
    $consulConfig = new consulConfig([
        'kind' => 'service-defaults',
        'name' => 'consul'
    ]);
    $consul->config()->getConfig($consulConfig);
});