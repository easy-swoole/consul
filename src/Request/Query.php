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
    protected $url = 'query/%s';

    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $session;
    /**
     * @var string
     */
    protected $token;
    /**
     * @var array
     */
    protected $service;
    /**
     * @var string
     */
    protected $DNS;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param string $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return array
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param array $service
     */
    public function setService($service)
    {
        $this->service = json_encode($service);
    }

    /**
     * @return string
     */
    public function getDNS()
    {
        return $this->DNS;
    }

    /**
     * @param string $DNS
     */
    public function setDNS($DNS)
    {
        $this->DNS = json_encode($DNS);
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
            'Name' => 'name',
            'Session' => 'session',
            'Token' => 'token',
            'Service' => 'service',
        ];
    }
}
