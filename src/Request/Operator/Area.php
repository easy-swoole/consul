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
    protected string $url = 'operator/area/%s';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var string
     */
    protected ?string $peerDatacenter = null;
    /**
     * @var array
     */
    protected ?array $retryJoin = null;
    /**
     * @var bool
     */
    protected ?bool $useTLS = null;
    /**
     * @var string
     */
    protected ?string $uuid = null;

    /**
     * @return string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc($dc): void
    {
        $this->dc = $dc;
    }

    /**
     * @return string
     */
    public function getPeerDatacenter(): ?string
    {
        return $this->peerDatacenter;
    }

    /**
     * @param string $peerDatacenter
     */
    public function setPeerDatacenter($peerDatacenter): void
    {
        $this->peerDatacenter = $peerDatacenter;
    }

    /**
     * @return array
     */
    public function getRetryJoin(): ?array
    {
        return $this->retryJoin;
    }

    /**
     * @param array $retryJoin
     */
    public function setRetryJoin($retryJoin): void
    {
        $this->retryJoin = $retryJoin;
    }

    /**
     * @return bool
     */
    public function isUseTLS(): ?bool
    {
        return $this->useTLS;
    }

    /**
     * @param bool $useTLS
     */
    public function setUseTLS($useTLS): void
    {
        $this->useTLS = $useTLS;
    }

    /**
     * @return string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid): void
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
