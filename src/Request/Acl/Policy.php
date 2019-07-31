<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午12:37
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

/**
 * Sample
 * {
    "Name": "node-read",
    "Description": "Grants read access to all node information",
    "Rules": "node_prefix \"\" { policy = \"read\"}",
    "Datacenters": ["dc1"]
    }
 * Class Policy
 * @package EasySwoole\Consul\Request\Acl
 */
class  Policy extends SplBean
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $Name ;
    /**
     * @var string
     */
    protected $Description;
    /**
     * @var string
     */
    protected $Rules;
    /**
     * @var string
     */
    protected $Datacenters;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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
    public function getRules(): ?string
    {
        return $this->Rules;
    }

    /**
     * @param string $Rules
     * @return null|void
     */
    public function setRules(string $Rules): ?void
    {
        $this->Rules = $Rules;
    }

    /**
     * @return null|string
     */
    public function getDatacenters(): ?string
    {
        return $this->Datacenters;
    }

    /**
     * @param string $Datacenters
     */
    public function setDatacenters(string $Datacenters): void
    {
        $this->Datacenters = $Datacenters;
    }
}