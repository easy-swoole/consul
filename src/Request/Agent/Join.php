<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Join extends BaseCommand
{
    protected $url = 'agent/join/%s';

    /**
     * @var string
     */
    protected $address;
    /**
     * @var string
     */
    protected $wan;

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getWan(): ?string
    {
        return $this->wan;
    }

    /**
     * @param string $wan
     */
    public function setWan(string $wan): void
    {
        $this->wan = $wan;
    }
}
