<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:48
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Operator\Area;
use EasySwoole\Consul\Request\Operator\Autopilot\Configuration;
use EasySwoole\Consul\Request\Operator\Autopilot\Health;
use EasySwoole\Consul\Request\Operator\Keyring;
use EasySwoole\Consul\Request\Operator\License;
use EasySwoole\Consul\Request\Operator\Raft\Peer;
use EasySwoole\Consul\Request\Operator\Segment;

interface OperatorInterface
{
    public function area(Area $area): mixed;

    public function areaList(Area $area): mixed;

    public function updateArea(Area $area): mixed;

    public function deleteArea(Area $area): mixed;

    public function joinArea(Area $area): mixed;

    public function membersArea(Area $area): mixed;

    public function getConfiguration(Configuration $configuration): mixed;

    public function updateConfiguration(Configuration $configuration): mixed;

    public function health(Health $health): mixed;

    public function getKeyring(Keyring $keyring): mixed;

    public function addKeyring(Keyring $keyring): mixed;

    public function changeKeyring(Keyring $keyring): mixed;

    public function deleteKeyring(Keyring $keyring): mixed;

    public function getLicense(License $license): mixed;

    public function updateLicense(License $license): mixed;

    public function resetLicense(License $license): mixed;

    public function getRaftConfiguration(\EasySwoole\Consul\Request\Operator\Raft\Configuration $configuration): mixed;

    public function peer(Peer $peer): mixed;

    public function segment(Segment $segment): mixed;
}
