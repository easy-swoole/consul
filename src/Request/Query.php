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
class Query extends BaseCommand
{
    protected string $url = 'query/%s';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var string
     */
    protected ?string $name = null;
    /**
     * @var string
     */
    protected ?string $session = null;
    /**
     * @var string
     */
    protected ?string $token = null;
    /**
     * @var array
     */
    protected ?array $service = null;
    /**
     * @var array
     */
    protected ?array $DNS = null;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSession(): ?string
    {
        return $this->session;
    }

    /**
     * @param string $session
     */
    public function setSession($session): void
    {
        $this->session = $session;
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return array
     */
    public function getService(): ?array
    {
        return $this->service;
    }

    /**
     * @param array $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }

    /**
     * @return array
     */
    public function getDNS(): ?array
    {
        return $this->DNS;
    }

    /**
     * @param array $DNS
     */
    public function setDNS($DNS): void
    {
        $this->DNS = $DNS;
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
            'Name' => 'name',
            'Session' => 'session',
            'Token' => 'token',
            'Service' => 'service',
            'DNS' => 'DNS',
        ];
    }
}
