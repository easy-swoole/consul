<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:33
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

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
class BindingRule extends SplBean
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $Description;
    /**
     * @var string
     */
    protected $AuthMethod;
    /**
     * @var string
     */
    protected $Selector;
    /**
     * @var string
     */
    protected $BindType;
    /**
     * @var string
     */
    protected $BindName;

    /**
     * @return null|string
     */
    public function getid(): ?string 
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setid(string $id): void 
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string 
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void 
    {
        $this->Description = $Description;
    }

    /**
     * @return null|string
     */
    public function getAuthMethod(): ?string 
    {
        return $this->AuthMethod;
    }

    /**
     * @param string $AuthMethod
     */
    public function setAuthMethod(string $AuthMethod): void 
    {
        $this->AuthMethod = $AuthMethod;
    }

    /**
     * @return null|string
     */
    public function getSelector(): ?string
    {
        return $this->Selector;
    }

    /**
     * @param string $Selector
     */
    public function setSelector(string $Selector): void
    {
        $this->Selector = $Selector;
    }

    /**
     * @return null|string
     */
    public function getBindType(): ?string
    {
        return $this->BindType;
    }

    /**
     * @param string $BindType
     */
    public function setBindType(string $BindType): void
    {
        $this->BindType = $BindType;
    }

    /**
     * @return null|string
     */
    public function getBindName(): ?string
    {
        return $this->BindName;
    }

    /**
     * @param string $BindName
     */
    public function setBindName(string $BindName): void
    {
        $this->BindName = $BindName;
    }
}