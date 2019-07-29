<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/30
 * Time: 上午12:34
 */
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Spl\SplBean;

class Deregister extends SplBean
{
    /**
     * @var string
     */
    protected $check_id;

    /**
     * @return null|string
     */
    public function getCheckId(): ?string
    {
        return $this->check_id;
    }

    /**
     * @param string $checkId
     */
    public function setCheckId(string $checkId): void
    {
        $this->check_id = $checkId;
    }
}