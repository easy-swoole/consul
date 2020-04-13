<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/5
 * Time: 下午11:24
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Session\Create;
use EasySwoole\Consul\Request\Session\Destroy;
use EasySwoole\Consul\Request\Session\Info;
use EasySwoole\Consul\Request\Session\Node;
use EasySwoole\Consul\Request\Session\Renew;
use EasySwoole\Consul\Request\Session\SessionList;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    protected $config;
    protected $consul;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    public function testCreate()
    {
        $create = new Create([
            'dc' => 'dc1',
            "LockDelay" => "15s",
            "Name" => "my-service-lock",
            "Node" => "foobar",
            "Checks" => ["a", "b", "c"],
            "Behavior" => "release",
            "TTL" => "30s",
        ]);
        $this->consul->session()->create($create);
        $this->assertEquals('x', 'x');
    }

    public function testDelete()
    {
        $destroy = new Destroy([
            'uuid' => 'f32a15b3-1baa-c047-bde9-bec3015ea013',
            'dc' => 'dc1',
        ]);
        $this->consul->session()->destroy($destroy);
        $this->assertEquals('x', 'x');
    }

    public function testInfo()
    {
        $info = new Info([
            'uuid' => 'f32a15b3-1baa-c047-bde9-bec3015ea013',
            'dc' => 'dc1',
        ]);
        $this->consul->session()->info($info);
        $this->assertEquals('x', 'x');
    }

    public function testNode()
    {
        $node = new Node([
            'node' => '2456c2850382',
            'dc' => 'dc1',
        ]);
        $this->consul->session()->node($node);
        $this->assertEquals('x', 'x');
    }

    public function testSessionList()
    {
        $sessionList = new SessionList([
            'dc' => 'dc1'
        ]);
        $this->consul->session()->sessionList($sessionList);
        $this->assertEquals('x', 'x');
    }

    public function testRenew()
    {
        $renew = new Renew([
            'uuid' => '4f6d1cf6-b60a-c929-eeb8-12f4d7eaff62',
            'dc' => 'dc1'
        ]);
        $this->consul->session()->renew($renew);
        $this->assertEquals('x', 'x');
    }
}
