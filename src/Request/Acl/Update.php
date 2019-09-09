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
    protected $url = 'acl/update';

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
    protected $type;
    /**
     * @var string
     */
    protected $rules;

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
    public function getType ()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType ($type)
    {
        $this->type = $type;
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

    protected function setKeyMapping (): array
    {
        return [
            'ID' => 'id',
            'Name' => 'name',
            'Type' => 'type',
            'Rules' => 'rules',
        ];
    }
}