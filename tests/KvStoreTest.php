<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/5
 * Time: 下午8:57
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Kv;
use PHPUnit\Framework\TestCase;

class KvStoreTest extends TestCase
{
    protected $config;
    protected $consul;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    public function testKv()
    {
        $kv = new Kv([
            'key' => 'my-key',
            'dc' => 'dc1',
        ]);
        $this->consul->kvStore()->kv($kv);
        $this->assertEquals('x', 'x');
    }

    public function testCreate()
    {
        $create = new kv([
            'key' => 'my-key',
            'dc' => 'dc1',
        ]);
        $this->consul->kvStore()->create($create);
        $this->assertEquals('x', 'x');
    }

    public function testUpdate()
    {
        $update = new kv([
            'key' => 'my-key',
            'dc' => 'dc1',
            'flag' => 'dc1'
        ]);
        $this->consul->kvStore()->update($update);
        $this->assertEquals('x', 'x');
    }

    public function testDelete()
    {
        $delete = new Kv([
            'key' => 'my-key',
            'recurse' => false,
        ]);
        $this->consul->kvStore()->delete($delete);
        $this->assertEquals('x', 'x');
    }
}
