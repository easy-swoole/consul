<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/4
 * Time: 下午10:13
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use PHPUnit\Framework\TestCase;

class ConsulConfigTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    function testConfig()
    {
        $config = new \EasySwoole\Consul\Request\Config([
            'Kind' => 'service-defaults',
            'Name' => 'web',
            'Protocol' => 'Http'
        ]);
        $this->consul->config()->config($config);
        $this->assertEquals('x','x');
    }

    function testGetConfig()
    {
        $config = new \EasySwoole\Consul\Request\Config([
            'Kind' => 'service-defaults',
            'name' => 'web',
        ]);
        $this->consul->config()->getConfig($config);
        $this->assertEquals('x','x');
    }

    function testListConfig()
    {
        $config = new \EasySwoole\Consul\Request\Config([
            'Kind' => 'service-defaults'
        ]);
        $this->consul->config()->listConfig($config);
        $this->assertEquals('x','x');
    }

    function testDeleteConfig()
    {
        $config = new \EasySwoole\Consul\Request\Config([
            'Kind' => 'service-defaults',
            'name' => 'web',
        ]);
        $this->consul->config()->deleteConfig($config);
        $this->assertEquals('x','x');
    }
}