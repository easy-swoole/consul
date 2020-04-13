<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/5
 * Time: 下午7:14
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Coordinate\Datacenters;
use EasySwoole\Consul\Request\Coordinate\Node;
use EasySwoole\Consul\Request\Coordinate\Nodes;
use EasySwoole\Consul\Request\Coordinate\Update;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    protected $config;
    protected $consul;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    public function testDatacenters()
    {
        $datacenters = new DataCenters();
        $this->consul->coordinates()->dataCenters($datacenters);
        $this->assertEquals('x', 'x');
    }

    public function testNodes()
    {
        $nodes = new Nodes([]);
        $this->consul->coordinates()->nodes($nodes);
        $this->assertEquals('x', 'x');
    }

    public function testNode()
    {
        $node = new Node([
            'node' => '2456c2850382',
        ]);
        $this->consul->coordinates()->node($node);
        $this->assertEquals('x', 'x');
    }

    public function testUpdate()
    {
        $update = new Update([
            'dc' => 'dc1',
            'node' => '2456c2850382',
            'Segment' => 'update',
            "Coord" => [
                "Adjustment" => 0,
                "Error" => 1.5,
                "Height" => 0,
                "Vec" => [0, 0, 0, 0, 0, 0, 0, 0]
            ]
        ]);
        $this->consul->coordinates()->update($update);
        $this->assertEquals('x', 'x');
    }
}
