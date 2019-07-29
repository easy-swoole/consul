<?php

namespace test;
use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Catalog\Register;

require_once 'vendor/autoload.php';

go(function (){
    $config = new Config([
        'Ip' => '127.0.0.1',
        'Port' => 8500,
        'Controller' => 'v1'
    ]);
    $consul = new Consul($config);

    $register = new Register([
        'Node' => 'testDc3', //required。 register node name。same Node will cover previous
        'Address' => '172.17.0.11', // required。if Address not provided, SkipNodeUpdate must be true
        'SkipNodeUpdate' => false, // depend on Address
        'Datacenter' => 'dc1', // optional. if not provided,defaults to the agent's dataCenter
        'ID' => '', // optional.it need properly format, if not,it will report error.
//        'TaggedAddresses' => [
//            'lan' => '172.17.0.8',
//            'wan' => '0.0.0.0',
//        ],
//        'NodeMeta' => [
//            'somekey' => '',
//        ],
//        'Service' => [
//            'ID' => 'redis1',
//            'Service' => 'redis',
//            'Tags' => ['primary','v1'],
//            'Address' => '127.0.0.1',
//            'TaggedAddress' => [
//                'lan' => [
//                    'address' => '127.0.0.1',
//                    'port' => 8000,
//                ],
//                'wan' => [
//                    'address' => '198.18.0.1',
//                    'port' => 80,
//                ],
//                'Meta' => [
//                    'redis_version' => '4.0',
//                ],
//                'port' => 8000,
//            ],
//        ],
//        "Check" => [
//            "Node" => "foobar",
//            "CheckID" => "service:redis1",
//            "Name" => "Redis health check",
//            "Notes" => "Script based health check",
//            "Status" => "passing",
//            "ServiceID" => "redis1",
//            "Definition" => [
//                "TCP" => "localhost:8888",
//                "Interval" => "5s",
//                "Timeout" => "1s",
//                "DeregisterCriticalServiceAfter" => "30s"
//            ]
//        ]
    ]);
    $consul->catalog()->register($register);

});

