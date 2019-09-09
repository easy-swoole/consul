<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午12:37
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

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
class  Policy extends BaseCommand
{
    protected $url = 'acl/policy/%s';

    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name ;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $rules;
    /**
     * @var string
     */
    protected $datacenters;

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
     * @return string
     */
    public function getRules ()
    {
        return $this->rules;
    }

    /**
     * @param string $rules
     */
    public function setRules ($rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return string
     */
    public function getDatacenters ()
    {
        return $this->datacenters;
    }

    /**
     * @param string $datacenters
     */
    public function setDatacenters ($datacenters)
    {
        $this->datacenters = $datacenters;
    }

    protected function setKeyMapping (): array
    {
        return [
            'ID' => 'id',
            'Name' => 'name',
            'Description' => 'description',
            'Rules' => 'rules',
            'Datacenters' => 'datacenters',
        ];
    }

}