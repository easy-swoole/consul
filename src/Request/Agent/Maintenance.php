<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Maintenance extends BaseCommand
{
    protected string $url = 'agent/maintenance';

    /**
     * Specifies whether to enable or disable maintenance mode
     * @var bool
     */
    protected ?bool $enable = null;
    /**
     * Specifies a text string explaining the reason for placing the node into maintenance mode.
     * @var string
     */
    protected ?string $reason = null;

    /**
     * @return bool|null
     */
    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    /**
     * @param bool $enable
     */
    public function setEnable(bool $enable): void
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
