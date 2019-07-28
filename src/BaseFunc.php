<?php


namespace EasySwoole\Consul;


use EasySwoole\HttpClient\HttpClient;
use EasySwoole\Spl\SplBean;

class BaseFunc
{
    protected $config;

    function __construct(Config $config)
    {
        $this->config = $config;
    }

    protected function putJSON(SplBean $bean)
    {
       $json = $bean->__toString();
       $httpClient = new HttpClient();
       /*
        * 这边去执行put请求并返回数据
        */
    }
}