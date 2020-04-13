<?php
namespace EasySwoole\Consul\Request\Agent\Service;

use EasySwoole\Consul\Request\BaseCommand;
/**
 * Sample
 * {
        "ID": "redis1",
        "Name": "redis",
        "Tags": [
        "primary",
        "v1"
        ],
        "Address": "127.0.0.1",
        "Port": 8000,
        "Meta": {
        "redis_version": "4.0"
        },
        "EnableTagOverride": false,
        "Check": {
        "DeregisterCriticalServiceAfter": "90m",
        "Args": ["/usr/local/bin/check_redis.py"],
        "HTTP": "http://localhost:5000/health",
        "Interval": "10s",
        "TTL": "15s"
        },
        "Weights": {
        "Passing": 10,
        "Warning": 1
        }
    }
 * Class Register
 * @package EasySwoole\Consul\Request\Agent\Service
 */
class Register extends BaseCommand
{
    protected $url = 'agent/service/register';

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $tags;
    /**
     * @var string
     */
    protected $address;
    /**
     * @var array
     */
    protected $taggedAddresses;
    /**
     * @var array
     */
    protected $meta;
    /**
     * @var int
     */
    protected $port;
    /**
     * @var string
     */
    protected $kind;
    /**
     * @var string
     */
    protected $proxyDestination;
    /**
     * @var string
     */
    protected $proxy;
    /**
     * @var string
     */
    protected $connect;
    /**
     * @var string
     */
    protected $check;
    /**
     * @var array<$Check>
     */
    protected $checks;
    /**
     * @var bool
     */
    protected $enableTagOverride;
    /**
     * @var string
     */
    protected $weights;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return array
     */
    public function getTaggedAddresses()
    {
        return $this->taggedAddresses;
    }

    /**
     * @param array $taggedAddresses
     */
    public function setTaggedAddresses($taggedAddresses)
    {
        $this->taggedAddresses = $taggedAddresses;
    }

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    public function setMeta($meta)
    {
        $this->meta = json_encode($meta);
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return string
     */
    public function getProxyDestination()
    {
        return $this->proxyDestination;
    }

    /**
     * @param string $proxyDestination
     */
    public function setProxyDestination($proxyDestination)
    {
        $this->proxyDestination = $proxyDestination;
    }

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param string $proxy
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * @return string
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * @param string $connect
     */
    public function setConnect($connect)
    {
        $this->connect = $connect;
    }

    /**
     * @return string
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * @param string $check
     */
    public function setCheck($check)
    {
        $this->check = json_encode($check);
    }

    /**
     * @return array
     */
    public function getChecks()
    {
        return $this->checks;
    }

    /**
     * @param array $checks
     */
    public function setChecks($checks)
    {
        $this->checks = $checks;
    }

    /**
     * @return bool
     */
    public function isEnableTagOverride()
    {
        return $this->enableTagOverride;
    }

    /**
     * @param bool $enableTagOverride
     */
    public function setEnableTagOverride($enableTagOverride)
    {
        $this->enableTagOverride = $enableTagOverride;
    }

    /**
     * @return string
     */
    public function getWeights()
    {
        return $this->weights;
    }

    /**
     * @param string $weights
     */
    public function setWeights($weights)
    {
        $this->weights = json_encode($weights);
    }

    protected function setKeyMapping(): array
    {
        return [
            'Name' => 'name',
            'Id' => 'id',
            'Tags' => 'tags',
            'Address' => 'address',
            'TaggedAddresses' => 'taggedAddresses',
            'Meta' => 'meta',
            'Port' => 'port',
            'Kind' => 'kind',
            'Proxy' => 'proxy',
            'Connect' => 'connect',
            'Check' => 'check',
            'Checks' => 'checks',
            'EnableTagOverride' => 'enableTagOverride',
            'Weights' => 'weights'
        ];
    }
}
