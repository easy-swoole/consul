<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Spl\SplBean;

class Maintenance extends SplBean
{
    /**
     * Specifies whether to enable or disable maintenance mode
     * @var bool
     */
    protected $enable;
    /**
     * Specifies a text string explaining the reason for placing the node into maintenance mode.
     * @var string
     */
    protected $reason;

    /**
     * @return bool|null
     */
    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    /**
     * @param string $enable
     * @return bool
     */
    public function setEnable(string $enable): bool
    {
        $this->enable = $enable;
    }

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }
}