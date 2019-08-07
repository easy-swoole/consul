<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/6
 * Time: 下午10:56
 */
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
use EasySwoole\Consul\Request\Operator\Area;
use EasySwoole\Consul\Request\Operator\Autopilot\Configuration;
use EasySwoole\Consul\Request\Operator\Autopilot\Health;
use EasySwoole\Consul\Request\Operator\Keyring;
use EasySwoole\Consul\Request\Operator\License;
use EasySwoole\Consul\Request\Operator\Raft\Peer;
use EasySwoole\Consul\Request\Operator\Segment;
use PHPUnit\Framework\TestCase;

class OperatorTest extends TestCase
{
    protected $config;
    protected $consul;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    function testArea()
    {
        $area = new Area([
            'PeerDatacenter' => 'dc1',
            "RetryJoin" => [ "10.1.2.3", "10.1.2.4", "10.1.2.5" ],
            "UseTLS" => false
        ]);
        $this->consul->operator()->area($area);
        $this->assertEquals('x','x');
    }

    function testGetArea()
    {
        $getArea = new Area([
            'dc' => 'dc1'
        ]);
        $this->consul->operator()->getArea($getArea);
        $this->assertEquals('x','x');
    }

    function testUpdateArea()
    {
        $area = new Area([
            'uuid' => '10275a2e-aa8f-2cf3-0adf-ff03d8950902',
            'UseTLS' => true,
        ]);
        $this->consul->operator()->updateArea($area);
        $this->assertEquals('x','x');
    }

    function testDeleteArea()
    {
        $area = new Area([
            'uuid' => '10275a2e-aa8f-2cf3-0adf-ff03d8950902',
        ]);
        $this->consul->operator()->deleteArea($area);
        $this->assertEquals('x','x');
    }
    function testJoin()
    {
        $area = new Area([
            'uuid' => '10275a2e-aa8f-2cf3-0adf-ff03d8950902',
        ]);
        $this->consul->operator()->joinArea($area);
        $this->assertEquals('x','x');
    }

    function testMembers()
    {
        $area = new Area([
            'uuid' => '10275a2e-aa8f-2cf3-0adf-ff03d8950902'
        ]);
        $this->consul->operator()->membersArea($area);
        $this->assertEquals('x','x');
    }

    function testGetConfiguration()
    {
        $configuration = new Configuration();
        $this->consul->operator()->getConfiguration($configuration);
        $this->assertEquals('x','x');
    }

    function testUpdateConfiguration()
    {
        $configuration = new Configuration([
            "CleanupDeadServers" => true,
            "LastContactThreshold" => "200ms",
            "MaxTrailingLogs" => 250,
            "ServerStabilizationTime" => "10s",
            "RedundancyZoneTag" => "",
            "DisableUpgradeMigration" => false,
            "UpgradeVersionTag" => "",

        ]);
        $this->consul->operator()->updateConfiguration($configuration);
        $this->assertEquals('x','x');
    }

    function testReadHealth()
    {
        $health = new Health();
        $this->consul->operator()->health($health);
        $this->assertEquals('x','x');
    }

    function testGetKeyring()
    {
        $keyring = new Keyring();
        $this->consul->operator()->getKeyring($keyring);
        $this->assertEquals('x','x');
    }

    function testAddKeyring()
    {
        $keyring = new Keyring([
            "Key" => "3lg9DxVfKNzI8O+IQ5Ek+Q==",
        ]);
        $this->consul->operator()->addKeyring($keyring);
        $this->assertEquals('x','x');
    }

    function testChangeKeyring()
    {
        $keyring = new Keyring([
            "Key" => "3lg9DxVfKNzI8O+IQ5Ek+Q==",
        ]);
        $this->consul->operator()->changeKeyring($keyring);
        $this->assertEquals('x','x');
    }

    function testDeleteKeyring()
    {
        $keyring = new Keyring([
            "Key" => "3lg9DxVfKNzI8O+IQ5Ek+Q==",
            "relayFactor" => 1
        ]);
        $this->consul->operator()->deleteKeyring($keyring);
        $this->assertEquals('x','x');
    }

    function testGetLicense()
    {
        $license = new License();
        $this->consul->operator()->getLicense($license);
        $this->assertEquals('x','x');
    }

    function testUpdateLicense()
    {
        $license = new License([
            'dc' => 'dc1'
        ]);
        $this->consul->operator()->updateLicense($license);
        $this->assertEquals('x','x');
    }

    function testResetLicense()
    {
        $license = new License([
            'dc' => ''
        ]);
        $this->consul->operator()->resetLicense($license);
        $this->assertEquals('x','x');
    }

    function testGetRaftConfiguration()
    {
        $raft = new \EasySwoole\Consul\Request\Operator\Raft\Configuration();
        $this->consul->operator()->getRaftConfiguration($raft);
        $this->assertEquals('x','x');
    }

    function testDeletePeer()
    {
        $peer = new Peer([
            'address' => '172.17.0.18:8301'
        ]);
        $this->consul->operator()->peer($peer);
        $this->assertEquals('x','x');
    }

    function testSegment()
    {
        $segment = new Segment();
        $this->consul->operator()->segment($segment);
        $this->assertEquals('x','x');
    }
}