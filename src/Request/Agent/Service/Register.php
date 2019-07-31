<?php
namespace EasySwoole\Consul\Request\Agent\Service;

use EasySwoole\Spl\SplBean;

class Register extends SplBean
{
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
     */
    /**
     * @var string
     */
    protected $Name;
    /**
     * @var string
     */
    protected $ID;
    /**
     * @var string
     */
    protected $Tags;
    /**
     * @var string
     */
    protected $Address;
    /**
     * @var array
     */
    protected $TaggedAddresses;
    /**
     * @var array
     */
    protected $Meta;
    /**
     * @var int
     */
    protected $Port;
    /**
     * @var string
     */
    protected $Kind;
    /**
     * @var string
     */
    protected $ProxyDestination;
    /**
     * @var string
     */
    protected $Proxy;
    /**
     * @var string
     */
    protected $Connect;
    /**
     * @var string
     */
    protected $Check;
    /**
     * @var array<$Check>
     */
    protected $Checks;
    /**
     * @var bool
     */
    protected $EnableTagOverride;
    /**
     * @var string
     */
    protected $Weights;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return string|null
     */
    public function getID(): ?string
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     */
    public function setID(string $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string|null
     */
    public function getTags(): ?string
    {
        return $this->Tags;
    }

    /**
     * @param string $Tags
     */
    public function setTags(string $Tags): void
    {
        $this->Tags = $Tags;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->Address;
    }

    /**
     * @param string $Address
     */
    public function setAddress(string $Address): void
    {
        $this->Address = $Address;
    }

    /**
     * @return array|null
     */
    public function getTaggedAddresses(): ?array
    {
        return $this->TaggedAddresses;
    }

    /**
     * @param array $TaggedAddresses
     */
    public function setTaggedAddresses(array $TaggedAddresses): void
    {
        $this->TaggedAddresses = $TaggedAddresses;
    }

    /**
     * @return array|null
     */
    public function getMeta(): ?array
    {
        return $this->Meta;
    }

    /**
     * @param array $Meta
     */
    public function setMeta(array $Meta): void
    {
        $this->Meta = $Meta;
    }

    /**
     * @return int|null
     */
    public function getPort(): ?int
    {
        return $this->Port;
    }

    /**
     * @param int $Port
     */
    public function setPort(int $Port): void
    {
        $this->Port = $Port;
    }

    /**
     * @return string|null
     */
    public function getKind(): ?string
    {
        return $this->Kind;
    }

    /**
     * @param string $Kind
     */
    public function setKind(string $Kind): void
    {
        $this->Kind = $Kind;
    }

    /**
     * @return string|null
     */
    public function getProxyDestination(): ?string
    {
        return $this->ProxyDestination;
    }

    /**
     * @param string $ProxyDestination
     */
    public function setProxyDestination(string $ProxyDestination): void
    {
        $this->ProxyDestination  =$ProxyDestination;
    }

    /**
     * @return string|null
     */
    public function getProxy(): ?string
    {
        return $this->Proxy;
    }

    /**
     * @param string $Proxy
     */
    public function setProxy(string $Proxy): void
    {
        $this->Proxy = $Proxy;
    }

    /**
     * @return string|null
     */
    public function getConnect(): ?string
    {
        return $this->Connect;
    }

    /**
     * @param string $Connect
     */
    public function setConnect(string $Connect): void
    {
        $this->Connect = $Connect;
    }

    /**
     * @return string|null
     */
    public function getCheck(): ?string
    {
        return $this->Check;
    }

    /**
     * @param string $Check
     */
    public function setCheck(string $Check): void
    {
        $this->Check = $Check;
    }

    /**
     * @return array|null
     */
    public function getChecks(): ?array
    {
        return $this->Checks;
    }

    /**
     * @param array $Checks
     */
    public function setChecks(array $Checks): void
    {
        $this->Checks = $Checks;
    }

    /**
     * @return bool|null
     */
    public function getEnableTagOverride(): ?bool
    {
        return $this->EnableTagOverride;
    }

    /**
     * @param bool $EnableTagOverride
     */
    public function setEnableTagOverride(bool $EnableTagOverride): void
    {
        $this->EnableTagOverride = $EnableTagOverride;
    }

    /**
     * @return string|null
     */
    public function getWeights(): ?string
    {
        return $this->Weights;
    }

    /**
     * @param string $Weights
     */
    public function setWeights(string $Weights): void
    {
        $this->Weights = $Weights;
    }
}