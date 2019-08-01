<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:02
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

/**
 * Sample
{
    "Name": "example-role",
    "Description": "Showcases all input parameters",
    "Policies": [
        {
            "ID": "783beef3-783f-f41f-7422-7087dc272765"
        },
        {
            "Name": "node-read"
        }
    ],
    "ServiceIdentities": [
        {
            "ServiceName": "web"
        },
        {
            "ServiceName": "db",
            "Datacenters": [
            "dc1"
        ]
        }
    ]
}
 *
 * Class Role
 * @package EasySwoole\Consul\Request\Acl
 */
class Role extends SplBean
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $Name;
    /**
     * @var string
     */
    protected $Description;
    /**
     * @var array
     */
    protected $Policies;
    /**
     * @var array
     */
    protected $ServiceIdentities;

    /**
     * @return null|string
     */
    public function getid(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setid(string $id): void
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
     * @return array|null
     */
    public function getPolicies(): ?array
    {
        return $this->Policies;
    }

    /**
     * @param array $Policies
     */
    public function setPolicies(array $Policies): void
    {
        $this->Policies = $Policies;
    }

    /**
     * @return array|null
     */
    public function getServiceIdentities(): ?array
    {
        return $this->ServiceIdentities;
    }

    /**
     * @param array $ServiceIdentities
     */
    public function setServiceIdentities(array $ServiceIdentities): void
    {
        $this->ServiceIdentities = $ServiceIdentities;
    }
}