<?php


namespace EasySwoole\Consul;


class BaseFunc
{
    protected $config;

    function __construct(Config $config)
    {
        $this->config = $config;
    }
}