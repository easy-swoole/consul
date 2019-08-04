<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/4
 * Time: 下午9:52
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Catalog\Connect;
use EasySwoole\Consul\Request\Catalog\Datacenters;
use EasySwoole\Consul\Request\Catalog\Deregister;
use EasySwoole\Consul\Request\Catalog\Node;
use EasySwoole\Consul\Request\Catalog\Nodes;
use EasySwoole\Consul\Request\Catalog\Register;
use EasySwoole\Consul\Request\Catalog\Service;
use EasySwoole\Consul\Request\Catalog\Services;
use PHPUnit\Framework\TestCase;

class CatalogTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);

    }

    function testRegister()
    {
        $register = new Register([
            'Node' => 'test_node2',
            'Address' => '192.0.0.1'
        ]);
        $this->consul->catalog()->register($register);
        $this->assertEquals('x','x');
    }

    function testDeregister()
    {
        $deregister = new Deregister([
            'Node' => 'test_node'
        ]);
        $this->consul->catalog()->deRegister($deregister);
        $this->assertEquals('x','x');
    }

    function testDatacenters()
    {
        $datacenters = new Datacenters();
        $this->consul->catalog()->dataCenters($datacenters);
        $this->assertEquals('x','x');
    }

    function testNodes()
    {
        $nodes = new Nodes();
        $this->consul->catalog()->nodes($nodes);
        $this->assertEquals('x','x');
    }

    function testServices()
    {
        $services = new Services();
        $this->consul->catalog()->services($services);
        $this->assertEquals('x','x');
    }

    function testService()
    {
        $service = new Service([
            'service' => 'consul'
        ]);
        $this->consul->catalog()->service($service);
        $this->assertEquals('x','x');
    }

    function testConnect()
    {
        $connect = new Connect([
            'connect' => 'consul'
        ]);
        $this->consul->catalog()->connect($connect);
        $this->assertEquals('x','x');
    }

    function testNode()
    {
        $node = new Node([
            'node' => '44e4656a94cd'
        ]);
        $this->consul->catalog()->node($node);
        $this->assertEquals('x','x');
    }
}