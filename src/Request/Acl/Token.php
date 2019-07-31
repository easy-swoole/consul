<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午11:49
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

/**
 * sample
 * {
        "Description": "Agent token for 'node1'",
        "Policies": [
        {
        "ID": "165d4317-e379-f732-ce70-86278c4558f7"
        },
        {
        "Name": "node-read"
        }
        ],
        "Local": false
        }
 * Class Token
 * @package EasySwoole\Consul\Request\Acl
 */
class Token extends SplBean
{
    /**
     * @var string
     */
    protected $AccessorID;
    /**
     * @var string
     */
    protected $SecretID;
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
    protected $Roles;
    /**
     * @var array
     */
    protected $ServiceIdentities;
    /**
     * @var bool
     */
    protected $Local;
    /**
     * @var string
     */
    protected $ExpirationTime;
    /**
     * @var string
     */
    protected $ExpirationTTL;

    /**
     * @return null|string
     */
    public function getAccessorID(): ?string
    {
        return $this->AccessorID;
    }

    /**
     * @param string $AccessorID
     */
    public function setAccessorID(string $AccessorID): void
    {
        $this->AccessorID = $AccessorID;
    }

    /**
     * @return null|string
     */
    public function getSecretID(): ?string
    {
        return $this->SecretID;
    }

    /**
     * @param string $SecretID
     */
    public function setSecretID(string $SecretID): void
    {
        $this->SecretID = $SecretID;
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
    public function getRoles(): ?array
    {
        return $this->Roles;
    }

    /**
     * @param string $Roles
     */
    public function setRoles(string $Roles): void
    {
        $this->Roles = $Roles;
    }

    /**
     * @return array|null
     */
    public function getServiceIdentities(): ?array
    {
        return $this->ServiceIdentities;
    }

    /**
     * @param string $ServiceIdentities
     */
    public function setServiceIdentities(string $ServiceIdentities): void
    {
        $this->ServiceIdentities = $ServiceIdentities;
    }

    /**
     * @return bool|null
     */
    public function getLocal(): ?bool
    {
        return $this->Local;
    }

    /**
     * @param bool $Local
     */
    public function setLocal(bool $Local): void
    {
        $this->Local = $Local;
    }

    /**
     * @return null|string
     */
    public function getExpirationTime(): ?string
    {
        return $this->ExpirationTime;
    }

    /**
     * @param string $ExpirationTime
     */
    public function setExpirationTime(string $ExpirationTime): void
    {
        $this->ExpirationTime = $ExpirationTime;
    }

    /**
     * @return null|string
     */
    public function getExpirationTTL(): ?string
    {
        return $this->ExpirationTTL = $ExpirationTTL;
    }

    /**
     * @param string $ExpirationTTL
     */
    public function setExpirationTTL(string $ExpirationTTL): void
    {
        $this->ExpirationTTL = $ExpirationTTL;
    }
}