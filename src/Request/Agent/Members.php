<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Members extends BaseCommand
{
    protected $url = 'agent/members';

    /**
     *  Specifies to list WAN members instead of the LAN members (which is the default)
     * @var bool
     */
    protected $wan = false;
    /**
     * @var string
     */
    protected $segment;

    /**
     * @return bool|null
     */
    public function getWan(): ?bool
    {
        return $this->wan;
    }

    /**
     * @param bool $wan
     */
    public function setWan(bool $wan): void
    {
        $this->wan = $wan;
    }

    /**
     * @return string|null
     */
    public function getSegment(): ?string
    {
        return $this->segment;
    }

    /**
     * @param string $segment
     */
    public function setSegment(string $segment): void
    {
        $this->segment = $segment;
    }
}
