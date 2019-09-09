<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午1:10
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class Login extends BaseCommand
{
    protected $url = 'acl/login';

    /**
     * @var string
     */
    protected $authMethod;
    /**
     * @var string
     */
    protected $bearerToken;
    /**
     * @var array
     */
    protected $meta;

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
    public function getBearerToken ()
    {
        return $this->bearerToken;
    }

    /**
     * @param string $bearerToken
     */
    public function setBearerToken ($bearerToken)
    {
        $this->bearerToken = $bearerToken;
    }

    /**
     * @return array
     */
    public function getMeta ()
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    public function setMeta ($meta)
    {
        $this->meta = $meta;
    }

    protected function setKeyMapping (): array
    {
        return [
            'AuthMethod' => 'authMethod',
            'BearerToken' => 'bearerToken',
            'Meta' => 'meta',
        ];
    }
}