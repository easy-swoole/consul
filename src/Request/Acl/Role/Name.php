<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:11
 */
namespace EasySwoole\Consul\Request\Acl\Role;

use EasySwoole\Spl\SplBean;

class Name extends SplBean
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return null|string
     */
    public function getname(): ?string
    {
        return $this->namel;
    }

    /**
     * @param string $name
     */
    public function setname(string $name): void
    {
        $this->name = $name;
    }
}