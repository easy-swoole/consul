<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/6
 * Time: 上午12:26
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Txn;
use PHPUnit\Framework\TestCase;

class TxnTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    function testCreate()
    {
        $transaction = new Txn([

        ]);
        $this->consul->transaction()->create($transaction);
        $this->assertEquals('x','x');
    }

}