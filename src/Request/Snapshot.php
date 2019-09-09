<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:18
 */
namespace EasySwoole\Consul\Request;

class Snapshot extends BaseCommand
{
    protected $url = 'snapshot';

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
     * @param string $stale
     */
    public function setStale(string $stale): void
    {
        $this->stale = $stale;
    }
}