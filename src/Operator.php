<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午11:35
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\MissingRequiredParamsException;
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
     */
    public function area(Area $area)
    {
        $area->setUrl(substr($area->getUrl(), 0, strlen($area->getUrl()) -3));
        $this->postJson($area);
    }

    /**
     * List Network Areas OR List Specific Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function areaList(Area $area)
    {
        if (empty($area->getUuid())) {
            $area->setUrl(substr($area->getUrl(), 0, strlen($area->getUrl()) -3));
        } else {
            $area->setUrl(sprintf($area->getUrl(), $area->getUuid()));
            $area->setUuid('');
        }

        $this->getJson($area);
    }

    /**
     * Update Network Area
     * @param Area $area
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateArea(Area $area)
    {
        if (empty($area->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $area->setUrl(sprintf($area->getUrl(), $area->getUuid()));
        $area->setUuid('');
        $this->putJSON($area);
    }

    /**
     * Delete Network Area
     * @param Area $area
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteArea(Area $area)
    {
        if (empty($area->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $area->setUrl(sprintf($area->getUrl(), $area->getUuid()));
        $area->setUuid('');
        $this->deleteJson($area);
    }

    /**
     * Join Network Area
     * @param Area $area
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function joinArea(Area $area)
    {
        if (empty($area->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $area->setUrl(sprintf($area->getUrl(), $area->getUuid() . '/join'));
        $area->setUuid('');
        $this->getJson($area);
    }

    /**
     * List Network Area Members
     * @param Area $area
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function membersArea(Area $area)
    {
        if (empty($area->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $area->setUrl(sprintf($area->getUrl(), $area->getUuid() . '/members'));
        $area->setUuid('');
        $this->getJson($area);
    }

    /**
     * Read Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getConfiguration(Configuration $configuration)
    {
        $this->getJson($configuration);
    }

    /**
     * Update Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateConfiguration(Configuration $configuration)
    {
        $this->putJSON($configuration);
    }

    /**
     * Read Health
     * @param Health $health
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function health(Health $health)
    {
        $this->getJson($health);
    }

    /**
     * List Gossip Encryption Keys
     * @param Keyring $keyring
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getKeyring(Keyring $keyring)
    {
        $this->getJson($keyring);
    }

    /**
     * Add New Gossip Encryption Key
     * @param Keyring $keyring
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function addKeyring(Keyring $keyring)
    {
        if (empty($keyring->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        $this->postJson($keyring);
    }

    /**
     * Change Primary Gossip Encryption Key
     * @param Keyring $keyring
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function changeKeyring(Keyring $keyring)
    {
        if (empty($keyring->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        $this->putJSON($keyring);
    }

    /**
     * Delete Gossip Encryption Key
     * @param Keyring $keyring
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteKeyring(Keyring $keyring)
    {
        if (empty($keyring->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        $this->deleteJson($keyring);
    }

    /**
     * Getting the Consul License
     * @param License $license
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getLicense(License $license)
    {
        $this->getJson($license);
    }

    /**
     * Updating the Consul License
     * @param License $license
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateLicense(License $license)
    {
        $this->putJSON($license);
    }

    /**
     * Resetting the Consul License
     * @param License $license
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function resetLicense(License $license)
    {
        $this->deleteJson($license);
    }

    /**
     * Read Configuration
     * @param raftConfig $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getRaftConfiguration(raftConfig $configuration)
    {
        $this->getJson($configuration);
    }

    /**
     * Delete Raft Peer
     * @param Peer $peer
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function peer(Peer $peer)
    {
        if (! empty($peer->getId()) || ! empty($peer->getAddress())) {
            $this->deleteJson($peer);
        } else {
            throw new MissingRequiredParamsException('Missing the required param: id or address.');
        }
    }

    /**
     * List Network Segments
     * @param Segment $segment
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function segment(Segment $segment)
    {
        $this->getJson($segment);
    }
}