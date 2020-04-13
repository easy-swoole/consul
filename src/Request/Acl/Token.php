<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午11:49
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

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
class Token extends BaseCommand
{
    protected $url = 'acl/token/%s';

    /**
     * @var string
     */
    protected $accessorID;
    /**
     * @var string
     */
    protected $secretID;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var array
     */
    protected $policies;
    /**
     * @var array
     */
    protected $roles;
    /**
     * @var array
     */
    protected $serviceIdentities;
    /**
     * @var bool
     */
    protected $local;
    /**
     * @var string
     */
    protected $expirationTime;
    /**
     * @var string
     */
    protected $expirationTTL;

    /**
     * @return string
     */
    public function getAccessorID()
    {
        return $this->accessorID;
    }

    /**
     * @param string $accessorID
     */
    public function setAccessorID($accessorID)
    {
        $this->accessorID = $accessorID;
    }

    /**
     * @return string
     */
    public function getSecretID()
    {
        return $this->secretID;
    }

    /**
     * @param string $secretID
     */
    public function setSecretID($secretID)
    {
        $this->secretID = $secretID;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getPolicies()
    {
        return $this->policies;
    }

    /**
     * @param array $policies
     */
    public function setPolicies($policies)
    {
        $this->policies = $policies;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return array
     */
    public function getServiceIdentities()
    {
        return $this->serviceIdentities;
    }

    /**
     * @param array $serviceIdentities
     */
    public function setServiceIdentities($serviceIdentities)
    {
        $this->serviceIdentities = $serviceIdentities;
    }

    /**
     * @return bool
     */
    public function isLocal()
    {
        return $this->local;
    }

    /**
     * @param bool $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return string
     */
    public function getExpirationTime()
    {
        return $this->expirationTime;
    }

    /**
     * @param string $expirationTime
     */
    public function setExpirationTime($expirationTime)
    {
        $this->expirationTime = $expirationTime;
    }

    /**
     * @return string
     */
    public function getExpirationTTL()
    {
        return $this->expirationTTL;
    }

    /**
     * @param string $expirationTTL
     */
    public function setExpirationTTL($expirationTTL)
    {
        $this->expirationTTL = $expirationTTL;
    }

    protected function setKeyMapping(): array
    {
        return [
            'AccessorID' => 'accessorID',
            'SecretID' => 'secretID',
            'Description' => 'description',
            'Policies' => 'policies',
            'Roles' => 'roles',
            'ServiceIdentities' => 'serviceIdentities',
            'Local' => 'local',
            'ExpirationTime' => 'expirationTime',
            'ExpirationTTL' => 'expirationTTL',
        ];
    }
}
