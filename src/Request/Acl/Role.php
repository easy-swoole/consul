<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:02
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;
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
class Role extends BaseCommand
{
    protected string $url = 'acl/role/%s';

    /**
     * @var string
     */
    protected ?string $id = null;
    /**
     * @var string
     */
    protected ?string $name = null;
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
    protected ?array $serviceIdentities = null;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
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

    protected function setKeyMapping(): array
    {
        return [
            'ID' => 'id',
            'Name' => 'name',
            'Description' => 'description',
            'Policies' => 'policies',
            'ServiceIdentities' => 'serviceIdentities',
        ];
    }
}
