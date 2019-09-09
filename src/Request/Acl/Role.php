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
    protected $url = 'acl/role/%s';

    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
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
    protected $serviceIdentities;

    /**
     * @return string
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId ($id)
    {
        $this->id = $id;
    }

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
     * @return array
     */
    public function getPolicies ()
    {
        return $this->policies;
    }

    /**
     * @param array $policies
     */
    public function setPolicies ($policies)
    {
        $this->policies = $policies;
    }

    /**
     * @return array
     */
    public function getServiceIdentities ()
    {
        return $this->serviceIdentities;
    }

    /**
     * @param array $serviceIdentities
     */
    public function setServiceIdentities ($serviceIdentities)
    {
        $this->serviceIdentities = $serviceIdentities;
    }

    protected function setKeyMapping (): array
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