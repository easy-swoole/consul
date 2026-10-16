<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午3:03
 */
namespace EasySwoole\Consul\Request\Operator\Raft;

use EasySwoole\Consul\Request\BaseCommand;

class Configuration extends BaseCommand
{
    protected string $url = 'operator/raft/configuration';

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
