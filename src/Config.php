<?php
namespace EasySwoole\Consul;

use EasySwoole\Spl\SplBean;

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
    protected $IP = '127.0.0.1';
    /**
     * @var string
     */
    protected $port = '8500';
    /**
     * @var string
     */
    protected $version = 'v1';

    /**
     * @return string
     */
    public function getIP()
    {
        return $this->IP;
    }

    /**
     * @param string $IP
     */
    public function setIP($IP)
    {
        $this->IP = $IP;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * compose url
     * @return string
     */
    public function __toString()
    {
        return $this->IP . ':' . $this->port . '/' . $this->version . '/';
    }
}
