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
    public function area(Area $area);

    public function areaList(Area $area);

    public function updateArea(Area $area);

    public function deleteArea(Area $area);

    public function joinArea(Area $area);

    public function membersArea(Area $area);

    public function getConfiguration(Configuration $configuration);

    public function updateConfiguration(Configuration $configuration);

    public function health(Health $health);

    public function getKeyring(Keyring $keyring);

    public function addKeyring(Keyring $keyring);

    public function changeKeyring(Keyring $keyring);

    public function deleteKeyring(Keyring $keyring);

    public function getLicense(License $license);

    public function updateLicense(License $license);

    public function resetLicense(License $license);

    public function getRaftConfiguration(\EasySwoole\Consul\Request\Operator\Raft\Configuration $configuration);

    public function peer(Peer $peer);

    public function segment(Segment $segment);
}