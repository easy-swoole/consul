<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午3:58
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Config;

class ConsulConfig extends BaseFunc
{
    /**
     * Apply Configuration
     * @param Config $config
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function config(Config $config)
    {
        $this->putJSON($config);
    }

    /**
     * Get Configuration
     * @param Config $config
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getConfig(Config $config)
    {
        $action = '';
        if (!empty($config->getName()) || !empty($config->getKind())) {
            $action = $config->getKind() . '/' . $config->getName();
            $config->setName('');
            $config->setKind('');
        }
        $this->getJson($config, $action);
    }

    /**
     * List Configurations
     * @param Config $config
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function listConfig(Config $config)
    {
        $action = '';
        if (!empty($config->getKind())) {
            $action = $config->getKind();
            $config->setKind('');
        }
        $this->getJson($config, $action);
    }

    /**
     * Delete Configuration
     * @param Config $config
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deleteConfig(Config $config)
    {
        $action = '';
        if (!empty($config->getName()) || !empty($config->getKind())) {
            $action = $config->getKind() . '/' . $config->getName();
            $config->setName('');
            $config->setKind('');
        }
        $this->deleteJson($config, $action);
    }
}