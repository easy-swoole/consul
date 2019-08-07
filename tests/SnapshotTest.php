<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/6
 * Time: 上午12:18
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Snapshot;
use PHPUnit\Framework\TestCase;

class SnapshotTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    function testGenerate()
    {
        $generate = new Snapshot();
        $this->consul->snapshot()->generate($generate);;
        $this->assertEquals('x','x');
    }

    function testRestore()
    {
        $restore = new Snapshot();
        $this->consul->snapshot()->restore($restore);;
        $this->assertEquals('x','x');
    }

}