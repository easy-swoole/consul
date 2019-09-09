<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/5
 * Time: 下午9:07
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Query;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    function testQuery()
    {
        $query = new Query([
            "name" => "my-query",
            "Session" => "adf4238a-882b-9ddc-4a9d-5b6758e4159e",
            "Token" => "11",
            "Service" => [
                "Service" => "redis",
                "Failover" => [
                    "NearestN" => 3,
                    "Datacenters" => ["dc1", "dc2"]
                 ],
                "Near" => "node1",
                "OnlyPassing" => false,
                "Tags" => ["primary", "!experimental"],
                "NodeMeta" => ["instance_type" => "m3.large"],
                "ServiceMeta" => ["environment" => "production"]
            ],
            "DNS" => [
                "TTL" => "10s"
            ],
        ]);
        $this->consul->query()->query($query);
        $this->assertEquals('x','x');
    }

    function testReadQuery()
    {
        $query = new Query([
            'dc' => 'dc1'
        ]);
        $this->consul->query()->readQuery($query);
        $this->assertEquals('x','x');
    }

    function testUpdateQuery()
    {
        $query = new Query([
            'uuid' => '90dce5ca-5697-ae2f-09ae-51e9542ea58c',
            'dc' => 'dc1',
        ]);
        $this->consul->query()->updateQuery($query);;
        $this->assertEquals('x','x');
    }

    function testDeleteQuery()
    {
        $query = new Query([
            'uuid' => '90dce5ca-5697-ae2f-09ae-51e9542ea58c'
        ]);
        $this->consul->query()->deleteQuery($query);;
        $this->assertEquals('x','x');
    }

    function testExecuteQuery()
    {
        $execute = new Query\Execute([
            'uuid' => '90dce5ca-5697-ae2f-09ae-51e9542ea58c',
            'dc' => 'dc1',
        ]);
        $this->consul->query()->execute($execute);;
        $this->assertEquals('x','x');
    }

    function testExplainQuery()
    {
        $execute = new Query\Explain([
            'uuid' => '90dce5ca-5697-ae2f-09ae-51e9542ea58c',
            'dc' => 'dc1',
        ]);
        $this->consul->query()->explain($execute);;
        $this->assertEquals('x','x');
    }
}