<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午11:35
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Acl\Logout;
use EasySwoole\Consul\Request\Operator\Area;
use EasySwoole\Consul\Request\Operator\Autopilot\Configuration;
use EasySwoole\Consul\Request\Operator\Autopilot\Health;
use EasySwoole\Consul\Request\Operator\Keyring;
use EasySwoole\Consul\Request\Operator\License;
use EasySwoole\Consul\Request\Operator\Raft\Configuration as raftConfig;
use EasySwoole\Consul\Request\Operator\Raft\Peer;
use EasySwoole\Consul\Request\Operator\Segment;

class Operator extends BaseFunc
{
    /**
     * Create Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function area(Area $area)
    {
        $this->postJson($area);
    }

    /**
     * List Network Areas OR List Specific Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getArea(Area $area)
    {
        $action = '';
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->getJson($area, $action);
    }

    /**
     * Update Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function updateArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->putJSON($area, $action);
    }

    /**
     * Delete Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deleteArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->deleteJson($area, $action);
    }

    /**
     * Join Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function joinArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->putJSON($area, $action,false);
    }

    /**
     * List Network Area Members
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function membersArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->getJson($area, $action,false);
    }

    /**
     * Read Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getConfiguration(Configuration $configuration)
    {
        $this->getJson($configuration);
    }

    /**
     * Update Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function updateConfiguration(Configuration $configuration)
    {
        $this->putJSON($configuration);
    }

    /**
     * Read Health
     * @param Health $health
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function health(Health $health)
    {
        $this->getJson($health);
    }

    /**
     * List Gossip Encryption Keys
     * @param Keyring $keyring
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getKeyring(Keyring $keyring)
    {
        $this->getJson($keyring);
    }

    /**
     * Add New Gossip Encryption Key
     * @param Keyring $keyring
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function addKeyring(Keyring $keyring)
    {
        $this->postJson($keyring);
    }

    /**
     * Change Primary Gossip Encryption Key
     * @param Keyring $keyring
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function changeKeyring(Keyring $keyring)
    {
        $this->putJSON($keyring);
    }

    /**
     * Delete Gossip Encryption Key
     * @param Keyring $keyring
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deleteKeyring(Keyring $keyring)
    {
        $this->deleteJson($keyring);
    }

    /**
     * Getting the Consul License
     * @param License $license
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getLicense(License $license)
    {
        $this->getJson($license);
    }

    /**
     * Updating the Consul License
     * @param License $license
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function updateLicense(License $license)
    {
        $this->putJSON($license);
    }

    /**
     * Resetting the Consul License
     * @param License $license
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function resetLicense(License $license)
    {
        $this->deleteJson($license);
    }

    /**
     * Read Configuration
     * @param raftConfig $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getRaftConfiguration(raftConfig $configuration)
    {
        $this->getJson($configuration);
    }

    /**
     * Delete Raft Peer
     * @param Peer $peer
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function peer(Peer $peer)
    {
        $this->deleteJson($peer);
    }

    /**
     * List Network Segments
     * @param Segment $segment
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function segment(Segment $segment)
    {
        $this->getJson($segment);
    }
}