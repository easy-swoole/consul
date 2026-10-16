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
    protected string $url = 'snapshot';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var bool
     */
    protected ?bool $stale = null;

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
