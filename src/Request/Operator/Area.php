<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午11:34
 */
namespace EasySwoole\Consul\Request\Operator;

use EasySwoole\Consul\Request\BaseCommand;

/**
 * Sample
{
    "PeerDatacenter": "dc2",
    "RetryJoin": [ "10.1.2.3", "10.1.2.4", "10.1.2.5" ],
    "UseTLS": false
}

 * Class Area
 * @package EasySwoole\Consul\Request\Operator
 */
class Area extends BaseCommand
{
    protected $url = 'operator/area/%s';

    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $peerDatacenter;
    /**
     * @var array
     */
    protected $retryJoin;
    /**
     * @var bool
     */
    protected $useTLS;
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @return string
     */
    public function getDc()
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc($dc)
    {
        $this->dc = $dc;
    }

    /**
     * @return string
     */
    public function getPeerDatacenter()
    {
        return $this->peerDatacenter;
    }

    /**
     * @param string $peerDatacenter
     */
    public function setPeerDatacenter($peerDatacenter)
    {
        $this->peerDatacenter = $peerDatacenter;
    }

    /**
     * @return array
     */
    public function getRetryJoin()
    {
        return $this->retryJoin;
    }

    /**
     * @param array $retryJoin
     */
    public function setRetryJoin($retryJoin)
    {
        $this->retryJoin = $retryJoin;
    }

    /**
     * @return bool
     */
    public function isUseTLS()
    {
        return $this->useTLS;
    }

    /**
     * @param bool $useTLS
     */
    public function setUseTLS($useTLS)
    {
        $this->useTLS = $useTLS;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }
    protected function setKeyMapping(): array
    {
        return [
            'PeerDatacenter' => 'peerDatacenter',
            'RetryJoin' => 'retryJoin',
            'UseTLS' => 'useTLS',
        ];
    }
}
