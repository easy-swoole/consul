<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午11:34
 */
namespace EasySwoole\Consul\Request\Operator;

use EasySwoole\Spl\SplBean;

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
class Area extends SplBean
{
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $PeerDatacenter;
    /**
     * @var array
     */
    protected $RetryJoin;
    /**
     * @var bool
     */
    protected $UseTLS;
    /**
     * @var string
     */
    protected $uuid;
    /**
     * @return null|string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc(string $dc): void
    {
        $this->dc = $dc;
    }

    /**
     * @return null|string
     */
    public function getPeerDatacenter(): ?string
    {
        return $this->PeerDatacenter;
    }

    /**
     * @param string $PeerDatacenter
     */
    public function setPeerDatacenter(string $PeerDatacenter): void
    {
        $this->PeerDatacenter = $PeerDatacenter;
    }

    /**
     * @return array|null
     */
    public function getRetryJoin(): ?array
    {
        return $this->RetryJoin;
    }

    /**
     * @param array $RetryJoin
     */
    public function setRetryJoin(array $RetryJoin): void
    {
        $this->RetryJoin = $RetryJoin;
    }

    /**
     * @return bool|null
     */
    public function getUseTLS(): ?bool
    {
        return $this->UseTLS;
    }

    /**
     * @param bool $UseTLS
     */
    public function setUseTLS(bool $UseTLS): void
    {
        $this->UseTLS = $UseTLS;
    }

    /**
     * @return null|string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
}