<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:16
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

class Roles extends SplBean
{
    /**
     * @var string
     */
    protected $policy;

    /**
     * @return null|string
     */
    public function getpolicy(): ?string
    {
        return $this->policy;
    }

    /**
     * @param string $policy
     */
    public function setpolicy(string $policy): void
    {
        $this->policy = $policy;
    }
}