<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Spl\SplBean;

class Members extends SplBean
{
    /**
     *  Specifies to list WAN members instead of the LAN members (which is the default)
     * @var bool
     */
    protected $wan = false;
    /**
     * @var
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