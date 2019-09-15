<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午3:58
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\ConsulConfigInterface;
use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Config;

class ConsulConfig extends BaseFunc implements ConsulConfigInterface
{
    /**
     * Apply Configuration
     * @param Config $config
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function config(Config $config)
    {
        $config->setUrl(substr($config->getUrl(), 0, strlen($config->getUrl()) -3));
        return $this->putJSON($config);
    }

    /**
     * Get Configuration
     * @param Config $config
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getConfig(Config $config)
    {
        if (empty($config->getKind())) {
            throw new MissingRequiredParamsException('Missing the required param: Kind.');
        }
        if (empty($config->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $config->setUrl(sprintf($config->getUrl(), $config->getKind() . '/' . $config->getName()));
        $config->setKind('');
        $config->setName('');
        return $this->getJson($config);
    }

    /**
     * List Configurations
     * @param Config $config
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function listConfig(Config $config)
    {
        if (empty($config->getKind())) {
            throw new MissingRequiredParamsException('Missing the required param: Kind.');
        }
        $config->setUrl(sprintf($config->getUrl(), $config->getKind()));
        $config->setKind('');
        return $this->getJson($config);
    }

    /**
     * Delete Configuration
     * @param Config $config
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteConfig(Config $config)
    {
        if (empty($config->getKind())) {
            throw new MissingRequiredParamsException('Missing the required param: Kind.');
        }
        if (empty($config->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $config->setUrl(sprintf($config->getUrl(), $config->getKind() . '/' . $config->getName()));
        $config->setKind('');
        $config->setName('');
        return $this->deleteJson($config);
    }
}