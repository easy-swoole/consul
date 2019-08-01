<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午11:18
 */
namespace EasySwoole\Consul\Request;

use EasySwoole\Spl\SplBean;

/**
 * Sample
{
  "Name": "my-query",
  "Session": "adf4238a-882b-9ddc-4a9d-5b6758e4159e",
  "Token": "",
  "Service": {
    "Service": "redis",
    "Failover": {
        "NearestN": 3,
        "Datacenters": ["dc1", "dc2"]
    },
    "Near": "node1",
    "OnlyPassing": false,
    "Tags": ["primary", "!experimental"],
    "NodeMeta": {"instance_type": "m3.large"},
    "ServiceMeta": {"environment": "production"}
  },
  "DNS": {
    "TTL": "10s"
}
 * Class Query
 * @package EasySwoole\Consul\Request
 */
class Query extends SplBean
{
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $Name;
    /**
     * @var string
     */
    protected $Session;
    /**
     * @var string
     */
    protected $Token;
    /**
     * @var array
     */
    protected $Service;
    /**
     * @var string
     */
    protected $DNS;
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
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->Name = $name;
    }

    /**
     * @return null|string
     */
    public function getSession(): ?string
    {
        return $this->Session;
    }

    /**
     * @param string $session
     */
    public function setSession(string $session): void
    {
        $this->Session = $session;
    }

    /**
     * @return array|null
     */
    public function getService(): ?array
    {
        return $this->Service;
    }

    /**
     * @param array $service
     */
    public function setService(array $service): void
    {
        $this->Service = $service;
    }

    /**
     * @return null|string
     */
    public function getDNS(): ?string
    {
        return $this->DNS;
    }

    /**
     * @param string $DNS
     */
    public function setDNS(string $DNS): void
    {
        $this->DNS = $DNS;
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