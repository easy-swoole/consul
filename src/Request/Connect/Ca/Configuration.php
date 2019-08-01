<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午7:17
 */
namespace EasySwoole\Consul\Request\Connect\Ca;

use EasySwoole\Spl\SplBean;

/**
 * Sample
 *
{
    "Provider": "consul",
    "Config": {
    "LeafCertTTL": "72h",
        "PrivateKey": "-----BEGIN RSA PRIVATE KEY-----...",
        "RootCert": "-----BEGIN CERTIFICATE-----...",
        "RotationPeriod": "2160h"
    }
}
 * Class Configuration
 * @package EasySwoole\Consul\Request\Connect\Ca
 */
class Configuration extends SplBean
{
    /**
     * @var string
     */
    protected $Provider;
    /**
     * @var array
     */
    protected $Config;

    /**
     * @return null|string
     */
    public function getProvider(): ?string
    {
        return $this->Provider;
    }

    /**
     * @param string $Provider
     */
    public function setProvider(string $Provider): void
    {
        $this->Provider = $Provider;
    }

    /**
     * @return array|null
     */
    public function getConfig(): ?array
    {
        return $this->Config;
    }

    /**
     * @param array $Config
     */
    public function setConfig(array $Config): void
    {
        $this->Config = $Config;
    }
}