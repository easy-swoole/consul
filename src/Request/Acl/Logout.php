<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午1:20
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class Logout extends BaseCommand
{
    protected $url = 'acl/logout';

    protected $token;

    /**
     * @return mixed
     */
    public function getToken ()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken ($token)
    {
        $this->token = $token;
    }
}