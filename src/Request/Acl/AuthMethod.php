<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:19
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

class AuthMethod extends SplBean
{
    /**
     * @var string
     */
    protected $Name;
    /**
     * @var string
     */
    protected $Type;
    /**
     * @var string
     */
    protected $Description;
    /**
     * @var string
     */
    protected $Config;
    /**
     * @return null|string
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
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     */
    public function setType(string $Type): void
    {
        $this->Type = $Type;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @return null|string
     */
    public function getConfig(): ?string
    {
        return $this->Config;
    }

    /**
     * @param string $Config
     */
    public function setConfig(string $Config): void
    {
        $this->Config = $Config;
    }
}