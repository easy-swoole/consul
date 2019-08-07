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
            "Name" => "consul"
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
            'uuid' => '90dce5ca-5697-ae2f-09ae-51e9542ea58c'
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
            'uuid' => '90dce5ca-5697-ae2f-09ae-51e9542ea58c'
        ]);
        $this->consul->query()->execute($execute);;
        $this->assertEquals('x','x');
    }
}