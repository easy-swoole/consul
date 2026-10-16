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
    protected string $url = 'acl/binding-rule/%s';

    /**
     * @var string
     */
    protected ?string $id = null;
    /**
     * @var string
     */
    protected ?string $description = null;
    /**
     * @var string
     */
    protected ?string $authMethod = null;
    /**
     * @var string
     */
    protected ?string $selector = null;
    /**
     * @var string
     */
    protected ?string $bindType = null;
    /**
     * @var string
     */
    protected ?string $bindName = null;

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
    public function getAuthMethod(): ?string
    {
        return $this->authMethod;
    }

    /**
     * @param string $authMethod
     */
    public function setAuthMethod($authMethod): void
    {
        $this->authMethod = $authMethod;
    }

    /**
     * @return string
     */
    public function getSelector(): ?string
    {
        return $this->selector;
    }

    /**
     * @param string $selector
     */
    public function setSelector($selector): void
    {
        $this->selector = $selector;
    }

    /**
     * @return string
     */
    public function getBindType(): ?string
    {
        return $this->bindType;
    }

    /**
     * @param string $bindType
     */
    public function setBindType($bindType): void
    {
        $this->bindType = $bindType;
    }

    /**
     * @return string
     */
    public function getBindName(): ?string
    {
        return $this->bindName;
    }

    /**
     * @param string $bindName
     */
    public function setBindName($bindName): void
    {
        $this->bindName = $bindName;
    }

    protected function setKeyMapping(): array
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
