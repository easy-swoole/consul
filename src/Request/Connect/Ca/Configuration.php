<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午7:17
 */
namespace EasySwoole\Consul\Request\Connect\Ca;

use EasySwoole\Consul\Request\BaseCommand;

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
class Configuration extends BaseCommand
{
    protected $url = 'connect/ca/configuration';
    /**
     * @var string
     */
    protected $provider;
    /**
     * @var array
     */
    protected $config;

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Provider' => 'provider',
            'Config' => 'config',
        ];
    }
}
