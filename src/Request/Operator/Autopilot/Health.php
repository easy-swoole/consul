<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午1:42
 */
namespace EasySwoole\Consul\Request\Operator\Autopilot;

use EasySwoole\Spl\SplBean;

class Health extends SplBean
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
     * @return null|void
     */
    public function setDc(string $dc): ?void
    {
        $this->dc = $dc;
    }
}