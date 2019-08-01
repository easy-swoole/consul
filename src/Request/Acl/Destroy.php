<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 下午9:58
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Spl\SplBean;

class Destroy extends SplBean
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @return null|string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }
}