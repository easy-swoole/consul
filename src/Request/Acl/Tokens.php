<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 下午9:34
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class Tokens extends BaseCommand
{
    protected $url = 'acl/tokens';

    /**
     * @var string
     */
    protected $policy;
    /**
     * @var string
     */
    protected $role;
    /**
     * @var string
     */
    protected $authmethod;

    /**
     * @return null|strings
     */
    public function getPolicy(): ?string
    {
        return $this->policy;
    }

    /**
     * @param string $policy
     */
    public function setPolicy(string $policy): void
    {
        $this->policy = $policy;
    }

    /**
     * @return null|string
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return null|string
     */
    public function getAuthMethod(): ?string
    {
        return $this->authmethod;
    }

    /**
     * @param string $authmethod
     */
    public function setAuthMethod(string $authmethod): void
    {
        $this->authmethod = $authmethod;
    }
}
