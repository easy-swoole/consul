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
    protected string $url = 'acl/policy/%s';

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
     * @var string
     */
    protected ?string $rules = null;
    /**
     * @var string
     */
    protected ?string $datacenters = null;

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
     * @return string
     */
    public function getRules(): ?string
    {
        return $this->rules;
    }

    /**
     * @param string $rules
     */
    public function setRules($rules): void
    {
        $this->rules = $rules;
    }

    /**
     * @return string
     */
    public function getDataCenters(): ?string
    {
        return $this->datacenters;
    }

    /**
     * @param string $datacenters
     */
    public function setDataCenters($datacenters): void
    {
        $this->datacenters = $datacenters;
    }

    protected function setKeyMapping(): array
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
