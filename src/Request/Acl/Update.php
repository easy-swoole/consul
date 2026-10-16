<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 下午9:55
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class Update extends BaseCommand
{
    protected string $url = 'acl/update';

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
    protected ?string $type = null;
    /**
     * @var string
     */
    protected ?string $rules = null;

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
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type): void
    {
        $this->type = $type;
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

    protected function setKeyMapping(): array
    {
        return [
            'ID' => 'id',
            'Name' => 'name',
            'Type' => 'type',
            'Rules' => 'rules',
        ];
    }
}
