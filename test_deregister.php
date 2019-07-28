<?php

namespace test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Catalog\Deregister;
require_once 'vendor/autoload.php';

go(function (){

   $consul = new Consul(new Config());

   $deRegister = new Deregister([
       'Node' => '39dc67aac634', // required
       'Datacenter' => 'dc2', // optional
       'CheckID' => '', // optional
       'ServiceID' => '', // optional
   ]);

   $consul->catalog()->deRegister($deRegister);
});