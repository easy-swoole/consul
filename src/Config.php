<?php
namespace EasySwoole\Consul;

use EasySwoole\Spl\SplBean;
use PhpParser\Node\Scalar\String_;

/**
 * 初始化 consul接口的ip:port/controller信息。不包含对应的action,param
 * Class Config
 * @package EasySwoole\Consul
 */
class Config extends SplBean
{
    /**
     * @var string
     */
    protected $Ip = '127.0.0.01';
    /**
     * @var string
     */
    protected $Port = '8500';
    /**
     * @var string
     */
    protected $Controller = 'v1';

    /**
     * @return null|String
     */
    public function getIp(): ?String
    {
        return $this->Ip;
    }

    /**
     * @param $ip
     */
    public function setIp($ip) :void
    {
        $this->Ip = $ip;
    }

    /**
     * @return null|String
     */
    public function getPort(): ?String
    {
        return $this->Port;
    }

    /**
     * @param $port
     */
    public function setPort($port): void
    {
        $this->Port = $port;
    }

    /**
     * @return null|String
     */
    public function getController(): ?String
    {
        return $this->Controller;
    }

    /**
     * @param $controller
     */
    public function setController($controller): void
    {
        $this->Controller = $controller;
    }

    /**
     * compose url
     * @return string
     */
    public function __toString()
    {
        return $this->Ip . ':' . $this->Port . '/' . $this->Controller . '/';
    }
}