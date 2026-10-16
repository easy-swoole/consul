<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 下午12:07
 */
namespace EasySwoole\Consul\Request\Acl\Token;

use EasySwoole\Consul\Request\BaseCommand;

class GetSelf extends BaseCommand
{
    protected string $url = 'acl/token/self';

    protected ?string $token = null;

    /**
     * @return mixed
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }
}
