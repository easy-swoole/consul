<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Spl\SplBean;

class ForceLeave extends SplBean
{
    /**
     * @var string
     */
    protected $node;

    /**
     * @return string|null
     */
    public function getNode(): ?string
    {
        return $this->node;
    }

    /**
     * @param string $node
     */
    public function setNode(string $node): void
    {
        $this->node = $node;
    }
}