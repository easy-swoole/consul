<?php
namespace EasySwoole\Consul\Request\Agent\Connect;

use EasySwoole\Spl\SplBean;

class Proxy extends SplBean
{
    /**
     * @var string
     */
    protected $ID;

    /**
     * @return string|null
     */
    public function getID(): ?string
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     */
    public function setID(string $ID): void
    {
        $this->ID = $ID;
    }
}