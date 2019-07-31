<?php
namespace EasySwoole\Consul\Request\Agent\Connect\Ca;

use EasySwoole\Spl\SplBean;

class Leaf extends SplBean
{
    /**
     * @var string
     */
    protected $Service;

    /**
     * @return string|null
     */
    public function getService(): ?string
    {
        return $this->Service;
    }

    /**
     * @param string $Service
     */
    public function setService(string $Service): void
    {
        $this->Service = $Service;
    }
}