<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 下午9:39
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

/**
 * Sample
 * {
    "Name": "my-app-token",
    "Type": "client",
    "Rules": ""
    }
 * Class Create
 * @package EasySwoole\Consul\Request\Acl
 */
class Create extends SplBean
{
    /**
     * @var string
     */
    protected $ID;
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
    protected $Rules;

    /**
     * @return null|string
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
    public function getRules(): ?string
    {
        return $this->Rules;
    }

    /**
     * @param string $Rules
     */
    public function setRules(string $Rules): void
    {
        $this->Rules = $Rules;
    }
}