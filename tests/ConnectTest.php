<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/4
 * Time: 下午11:23
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Connect\Ca\Configuration;
use EasySwoole\Consul\Request\Connect\Ca\Roots;
use EasySwoole\Consul\Request\Connect\Intentions;
use PHPUnit\Framework\TestCase;

class ConnectTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    function testRoots()
    {
        $roots = new Roots();
        $this->consul->connect()->roots($roots);
        $this->assertEquals('x','x');
    }

    function testConfiguration()
    {
        $configuration = new Configuration();
        $this->consul->connect()->configuration($configuration);
        $this->assertEquals('x','x');
    }

    function testUpdateConfiguration()
    {
        $configuration = new Configuration([
            'Provider' => 'consul',
            'Config' => [
                'LeafCertTTL' => '72h'
            ]
        ]);
        $this->consul->connect()->updateConfiguration($configuration);
        $this->assertEquals('x','x');
    }

    function testIntentions()
    {
        $intentions = new Intentions([
            'SourceName' => 'web',
            'DestinationName' => 'db',
            'SourceType' => 'consul',
            'action' => 'allow'
        ]);
        $this->consul->connect()->intentions($intentions);
        $this->assertEquals('x','x');
    }

    function testReadIntentions()
    {
        $intentions = new Intentions([
            'uuid' => 'e9ebc19f-d481-42b1-4871-4d298d3acd5c',
        ]);
        $this->consul->connect()->readIntention($intentions);
        $this->assertEquals('x','x');
    }

    function testListIntentions()
    {
        $intentions = new Intentions();
        $this->consul->connect()->listIntention($intentions);
        $this->assertEquals('x','x');
    }

    function testUpdateIntentions()
    {
        $intentions = new Intentions([
            'uuid' => 'b40faaf3-34aa-349f-3cf2-f5d720240662',
            'description' => 'just a test description',
            'SourceName' => 'aa',
            'DestinationName' => 'bb',
            'Action' => 'allow'
        ]);
        $this->consul->connect()->updateIntention($intentions);
        $this->assertEquals('x','x');
    }

    function testDeleteIntentions()
    {
        $intentions = new Intentions([
            'uuid' => 'b40faaf3-34aa-349f-3cf2-f5d720240662',
        ]);
        $this->consul->connect()->deleteIntention($intentions);
        $this->assertEquals('x','x');
    }

    function testCheck()
    {
        $intentions = new Intentions\Check([
            'source' => 'web',
            'destination' => 'db',
        ]);
        $this->consul->connect()->check($intentions);
        $this->assertEquals('x','x');
    }


    function testMatch()
    {
        $intentions = new Intentions\Match([
            'by' => 'source',
            'name' => 'web',
        ]);
        $this->consul->connect()->match($intentions);
        $this->assertEquals('x','x');
    }
}