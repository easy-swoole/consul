<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:19
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class AuthMethod extends BaseCommand
{
    protected $url = 'acl/auth-method/%s';

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $config;

    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName ($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType ()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType ($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription ()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getConfig ()
    {
        return $this->config;
    }

    /**
     * @param string $config
     */
    public function setConfig ($config)
    {
        $this->config = json_encode($config);
    }

    protected function setKeyMapping (): array
    {
        return [
            'Name' => 'name',
            'Type' => 'type',
            'Description' => 'description',
            'Config' => 'config',
        ];
    }
}