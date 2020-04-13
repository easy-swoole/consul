<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午11:35
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\OperatorInterface;
use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Operator\Area;
use EasySwoole\Consul\Request\Operator\Autopilot\Configuration;
use EasySwoole\Consul\Request\Operator\Autopilot\Health;
use EasySwoole\Consul\Request\Operator\Keyring;
use EasySwoole\Consul\Request\Operator\License;
use EasySwoole\Consul\Request\Operator\Raft\Configuration as raftConfig;
use EasySwoole\Consul\Request\Operator\Raft\Peer;
use EasySwoole\Consul\Request\Operator\Segment;

class Operator extends BaseFunc implements OperatorInterface
{
    /**
     * Create Network Area
     * @param Area $area
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function area(Area $area)
    {
        $area->setUrl(substr($area->getUrl(), 0, strlen($area->getUrl()) -3));
        return $this->postJson($area);
    }

    /**
     * List Network Areas OR List Specific Network Area
     * @param Area $area
     * @return mixed
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

        return $this->getJson($area);
    }

    /**
     * Update Network Area
     * @param Area $area
     * @return mixed
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
        return $this->putJSON($area);
    }

    /**
     * Delete Network Area
     * @param Area $area
     * @return mixed
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
        return $this->deleteJson($area);
    }

    /**
     * Join Network Area
     * @param Area $area
     * @return mixed
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
        return $this->getJson($area);
    }

    /**
     * List Network Area Members
     * @param Area $area
     * @return mixed
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
        return $this->getJson($area);
    }

    /**
     * Read Configuration
     * @param Configuration $configuration
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getConfiguration(Configuration $configuration)
    {
        return $this->getJson($configuration);
    }

    /**
     * Update Configuration
     * @param Configuration $configuration
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateConfiguration(Configuration $configuration)
    {
        return $this->putJSON($configuration);
    }

    /**
     * Read Health
     * @param Health $health
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function health(Health $health)
    {
        return $this->getJson($health);
    }

    /**
     * List Gossip Encryption Keys
     * @param Keyring $keyring
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getKeyring(Keyring $keyring)
    {
        return $this->getJson($keyring);
    }

    /**
     * Add New Gossip Encryption Key
     * @param Keyring $keyring
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function addKeyring(Keyring $keyring)
    {
        if (empty($keyring->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        return $this->postJson($keyring);
    }

    /**
     * Change Primary Gossip Encryption Key
     * @param Keyring $keyring
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function changeKeyring(Keyring $keyring)
    {
        if (empty($keyring->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        return $this->putJSON($keyring);
    }

    /**
     * Delete Gossip Encryption Key
     * @param Keyring $keyring
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteKeyring(Keyring $keyring)
    {
        if (empty($keyring->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        return $this->deleteJson($keyring);
    }

    /**
     * Getting the Consul License
     * @param License $license
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getLicense(License $license)
    {
        return $this->getJson($license);
    }

    /**
     * Updating the Consul License
     * @param License $license
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateLicense(License $license)
    {
        return $this->putJSON($license);
    }

    /**
     * Resetting the Consul License
     * @param License $license
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function resetLicense(License $license)
    {
        return $this->deleteJson($license);
    }

    /**
     * Read Configuration
     * @param raftConfig $configuration
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getRaftConfiguration(raftConfig $configuration)
    {
        return $this->getJson($configuration);
    }

    /**
     * Delete Raft Peer
     * @param Peer $peer
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function peer(Peer $peer)
    {
        if (! empty($peer->getId()) || ! empty($peer->getAddress())) {
            return $this->deleteJson($peer);
        } else {
            throw new MissingRequiredParamsException('Missing the required param: id or address.');
        }
    }

    /**
     * List Network Segments
     * @param Segment $segment
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function segment(Segment $segment)
    {
        return $this->getJson($segment);
    }
}
