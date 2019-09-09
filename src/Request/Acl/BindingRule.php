<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:33
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

/**
 * Sample
 *{
    "Description": "example rule",
    "AuthMethod": "minikube",
    "Selector": "serviceaccount.namespace==default",
    "BindType": "service",
    "BindName": "{{ serviceaccount.name }}"
  }
 * Class BindingRule
 * @package EasySwoole\Consul\Request\Acl
 */
class BindingRule extends BaseCommand
{
    protected $url = 'acl/binding-rule/%s';

    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $authMethod;
    /**
     * @var string
     */
    protected $selector;
    /**
     * @var string
     */
    protected $bindType;
    /**
     * @var string
     */
    protected $bindName;

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
    public function getAuthMethod ()
    {
        return $this->authMethod;
    }

    /**
     * @param string $authMethod
     */
    public function setAuthMethod ($authMethod)
    {
        $this->authMethod = $authMethod;
    }

    /**
     * @return string
     */
    public function getSelector ()
    {
        return $this->selector;
    }

    /**
     * @param string $selector
     */
    public function setSelector ($selector)
    {
        $this->selector = $selector;
    }

    /**
     * @return string
     */
    public function getBindType ()
    {
        return $this->bindType;
    }

    /**
     * @param string $bindType
     */
    public function setBindType ($bindType)
    {
        $this->bindType = $bindType;
    }

    /**
     * @return string
     */
    public function getBindName ()
    {
        return $this->bindName;
    }

    /**
     * @param string $bindName
     */
    public function setBindName ($bindName)
    {
        $this->bindName = $bindName;
    }

    protected function setKeyMapping (): array
    {
        return [
            'ID' => 'id',
            'Description' => 'description',
            'AuthMethod' => 'authMethod',
            'Selector' => 'selector',
            'BindType' => 'bindType',
            'BindName' => 'bindName',
        ];
    }
}