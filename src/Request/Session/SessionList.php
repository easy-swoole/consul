<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:57
 */
namespace EasySwoole\Consul\Request\Session;

use EasySwoole\Spl\SplBean;

class SessionList extends SplBean
{
    /**
     * @var string
     */
    protected $dc;

    /**
     * @return null|string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc(string $dc):void
    {
        $this->dc = $dc;
    }
}