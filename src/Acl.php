<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午12:55
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Acl\Bootstrap;
use EasySwoole\Consul\Request\Acl\Login;
use EasySwoole\Consul\Request\Acl\Logout;
use EasySwoole\Consul\Request\Acl\Replication;

class Acl extends BaseFunc
{
    /**
     * Bootstrap ACLs
     * @param Bootstrap $bootstrap
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function bootstrap(Bootstrap $bootstrap)
    {
        $this->putJSON($bootstrap);
    }

    /**
     * Check ACL Replication
     * @param Replication $replication
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function replication(Replication $replication)
    {
        $this->getJson($replication);
    }

    /**
     * Lack
     * Translate Rules
     */

    /**
     * Lack
     * Translate a Legacy Token's Rules
     */

    /**
     * Login to Auth Method
     * @param Login $login
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function login(Login $login)
    {
        $this->postJson($login);
    }

    /**
     * Logout from Auth Method
     * @param Logout $logout
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function logout(Logout $logout)
    {
        $header = array(
            'X-Consul-Token' => 'b78d37c7-0ca7-5f4d-99ee-6d9975ce4586',
        );
        $this->postJson($logout, '', $header);
    }

}