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
    protected string $url = 'acl/login';

    /**
     * @var string
     */
    protected ?string $authMethod = null;
    /**
     * @var string
     */
    protected ?string $bearerToken = null;
    /**
     * @var array
     */
    protected ?array $meta = null;

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
    public function getBearerToken(): ?string
    {
        return $this->bearerToken;
    }

    /**
     * @param string $bearerToken
     */
    public function setBearerToken($bearerToken): void
    {
        $this->bearerToken = $bearerToken;
    }

    /**
     * @return array
     */
    public function getMeta(): ?array
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    public function setMeta($meta): void
    {
        $this->meta = $meta;
    }

    protected function setKeyMapping(): array
    {
        return [
            'AuthMethod' => 'authMethod',
            'BearerToken' => 'bearerToken',
            'Meta' => 'meta',
        ];
    }
}
