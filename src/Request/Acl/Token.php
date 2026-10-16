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
    protected string $url = 'acl/token/%s';

    /**
     * @var string
     */
    protected ?string $accessorID = null;
    /**
     * @var string
     */
    protected ?string $secretID = null;
    /**
     * @var string
     */
    protected ?string $description = null;
    /**
     * @var array
     */
    protected ?array $policies = null;
    /**
     * @var array
     */
    protected ?array $roles = null;
    /**
     * @var array
     */
    protected ?array $serviceIdentities = null;
    /**
     * @var bool
     */
    protected ?bool $local = null;
    /**
     * @var string
     */
    protected ?string $expirationTime = null;
    /**
     * @var string
     */
    protected ?string $expirationTTL = null;

    /**
     * @return string
     */
    public function getAccessorID(): ?string
    {
        return $this->accessorID;
    }

    /**
     * @param string $accessorID
     */
    public function setAccessorID($accessorID): void
    {
        $this->accessorID = $accessorID;
    }

    /**
     * @return string
     */
    public function getSecretID(): ?string
    {
        return $this->secretID;
    }

    /**
     * @param string $secretID
     */
    public function setSecretID($secretID): void
    {
        $this->secretID = $secretID;
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
     * @return array
     */
    public function getPolicies(): ?array
    {
        return $this->policies;
    }

    /**
     * @param array $policies
     */
    public function setPolicies($policies): void
    {
        $this->policies = $policies;
    }

    /**
     * @return array
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return array
     */
    public function getServiceIdentities(): ?array
    {
        return $this->serviceIdentities;
    }

    /**
     * @param array $serviceIdentities
     */
    public function setServiceIdentities($serviceIdentities): void
    {
        $this->serviceIdentities = $serviceIdentities;
    }

    /**
     * @return bool
     */
    public function isLocal(): ?bool
    {
        return $this->local;
    }

    /**
     * @param bool $local
     */
    public function setLocal($local): void
    {
        $this->local = $local;
    }

    /**
     * @return string
     */
    public function getExpirationTime(): ?string
    {
        return $this->expirationTime;
    }

    /**
     * @param string $expirationTime
     */
    public function setExpirationTime($expirationTime): void
    {
        $this->expirationTime = $expirationTime;
    }

    /**
     * @return string
     */
    public function getExpirationTTL(): ?string
    {
        return $this->expirationTTL;
    }

    /**
     * @param string $expirationTTL
     */
    public function setExpirationTTL($expirationTTL): void
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
