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
    protected string $url = 'agent/service/register';

    /**
     * @var string
     */
    protected ?string $name = null;
    /**
     * @var string
     */
    protected ?string $id = null;
    /**
     * @var string
     */
    protected ?string $tags = null;
    /**
     * @var string
     */
    protected ?string $address = null;
    /**
     * @var array
     */
    protected ?array $taggedAddresses = null;
    /**
     * @var array
     */
    protected ?array $meta = null;
    /**
     * @var int
     */
    protected ?int $port = null;
    /**
     * @var string
     */
    protected ?string $kind = null;
    /**
     * @var string
     */
    protected ?string $proxyDestination = null;
    /**
     * @var string
     */
    protected ?string $proxy = null;
    /**
     * @var string
     */
    protected ?string $connect = null;
    /**
     * @var string
     */
    protected ?string $check = null;
    /**
     * @var array<$Check>
     */
    protected ?array $checks = null;
    /**
     * @var bool
     */
    protected ?bool $enableTagOverride = null;
    /**
     * @var string
     */
    protected ?string $weights = null;

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
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTags(): ?string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags($tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return array
     */
    public function getTaggedAddresses(): ?array
    {
        return $this->taggedAddresses;
    }

    /**
     * @param array $taggedAddresses
     */
    public function setTaggedAddresses($taggedAddresses): void
    {
        $this->taggedAddresses = $taggedAddresses;
    }

    /**
     * @return array
     */
    public function getMeta(): ?array
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    public function setMeta($meta): void
    {
        $this->meta = $meta;
    }

    /**
     * @return int
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port): void
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     */
    public function setKind($kind): void
    {
        $this->kind = $kind;
    }

    /**
     * @return string
     */
    public function getProxyDestination(): ?string
    {
        return $this->proxyDestination;
    }

    /**
     * @param string $proxyDestination
     */
    public function setProxyDestination($proxyDestination): void
    {
        $this->proxyDestination = $proxyDestination;
    }

    /**
     * @return string
     */
    public function getProxy(): ?string
    {
        return $this->proxy;
    }

    /**
     * @param string $proxy
     */
    public function setProxy($proxy): void
    {
        $this->proxy = $proxy;
    }

    /**
     * @return string
     */
    public function getConnect(): ?string
    {
        return $this->connect;
    }

    /**
     * @param string $connect
     */
    public function setConnect($connect): void
    {
        $this->connect = $connect;
    }

    /**
     * @return string
     */
    public function getCheck(): ?string
    {
        return $this->check;
    }

    /**
     * @param string $check
     */
    public function setCheck($check): void
    {
        $this->check = $check;
    }

    /**
     * @return array
     */
    public function getChecks(): ?array
    {
        return $this->checks;
    }

    /**
     * @param array $checks
     */
    public function setChecks($checks): void
    {
        $this->checks = $checks;
    }

    /**
     * @return bool
     */
    public function isEnableTagOverride(): ?bool
    {
        return $this->enableTagOverride;
    }

    /**
     * @param bool $enableTagOverride
     */
    public function setEnableTagOverride($enableTagOverride): void
    {
        $this->enableTagOverride = $enableTagOverride;
    }

    /**
     * @return string
     */
    public function getWeights(): ?string
    {
        return $this->weights;
    }

    /**
     * @param string $weights
     */
    public function setWeights($weights): void
    {
        $this->weights = $weights;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Name' => 'name',
            'ID' => 'id',
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
