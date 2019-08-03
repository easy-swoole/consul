<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午3:03
 */
namespace EasySwoole\Consul\Request\Operator\Raft;

use EasySwoole\Spl\SplBean;

class Configuration extends SplBean
{
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var bool
     */
    protected $stale;

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
    public function setDc(string $dc): void
    {
        $this->dc = $dc;
    }

    /**
     * @return bool|null
     */
    public function getStale(): ?bool
    {
        return $this->stale;
    }

    /**
     * @param bool $stale
     */
    public function setStale(bool $stale): void
    {
        $this->stale = $stale;
    }
}