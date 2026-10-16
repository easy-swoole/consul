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
    protected string $url = 'acl/auth-method/%s';

    /**
     * @var array
     */
    protected ?array $name = null;
    /**
     * @var string
     */
    protected ?string $type = null;
    /**
     * @var string
     */
    protected ?string $description = null;
    /**
     * @var string
     */
    protected ?string $config = null;

    /**
     * @return array
     */
    public function getName(): ?array
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
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getConfig(): ?string
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig($config): void
    {
        $this->config = $config;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Name' => 'name',
            'Type' => 'type',
            'Description' => 'description',
            'Config' => 'config',
        ];
    }
}
