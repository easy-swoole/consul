<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/28
 * Time: 下午9:10
 */
namespace test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Catalog\Nodes;
require_once 'vendor/autoload.php';

go(function (){

    $consul = new Consul(new Config());
    $nodes = new Nodes([
        'dc' => 'dc1',
        'near' => 'e17bfe614614', // node name,排序用。命中的返回的节点信息会靠前
//        'node_meta' => 'aa',
//        'filter' => 'a',
    ]);
    $consul->catalog()->nodes($nodes);
});