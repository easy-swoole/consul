<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午9:07
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Config;

interface ConsulConfigInterface
{
    public function config(Config $config): mixed;

    public function getConfig(Config $config): mixed;

    public function listConfig(Config $config): mixed;

    public function deleteConfig(Config $config): mixed;
}
