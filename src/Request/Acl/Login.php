<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午1:10
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

class Login extends SplBean
{
    /**
     * @var string
     */
    protected $AuthMethod;
    /**
     * @var string
     */
    protected $BearerToken;
    /**
     * @var array
     */
    protected $Meta;

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
    public function getBearerToken(): ?string
    {
        return $this->BearerToken;
    }

    /**
     * @param string $BearerToken
     */
    public function setBearerToken(string $BearerToken): void
    {
        $this->BearerToken = $BearerToken;
    }

    /**
     * @return array|null
     */
    public function getMeta(): ?array
    {
        return $this->Meta;
    }

    /**
     * @param array $Meta
     */
    public function setMeta(array $Meta): void
    {
        $this->Meta = $Meta;
    }
}