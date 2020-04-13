<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/6
 * Time: 上午12:22
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Status\Leader;
use EasySwoole\Consul\Request\Status\Peers;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    protected $config;
    protected $consul;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    public function testLeader()
    {
        $leader = new Leader();
        var_dump($this->consul->status()->leader($leader));
        $this->assertEquals('x', 'x');
    }

    public function testPeers()
    {
        $peers = new Peers([
            'dc' => 'dc1',
        ]);
        var_dump($this->consul->status()->peers($peers));
        $this->assertEquals('x', 'x');
    }
}
