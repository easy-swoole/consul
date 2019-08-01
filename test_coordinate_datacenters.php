<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午9:17
 */
namespace test;
use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Config as consulConfig;
use EasySwoole\Consul\Request\Coordinate\Datacenters;

require_once 'vendor/autoload.php';

go(function (){
    $consul = new Consul(new Config());
    $consul->coordinates()->datacenters(new Datacenters());
});