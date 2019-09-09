<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/5
 * Time: 下午8:29
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Event\Fire;
use EasySwoole\Consul\Request\Event\ListEvent;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    function testFire()
    {
        $fire = new Fire([
            'name' => 'consul',
            'dc' => 'dc1',
        ]);
        $this->consul->event()->fire($fire);
        $this->assertEquals('x','x');
    }

    function testListEvent()
    {
        $listEvent = new ListEvent([
            'name' => 'consul',
        ]);
        $this->consul->event()->listEvent($listEvent);
        $this->assertEquals('x','x');
    }
}