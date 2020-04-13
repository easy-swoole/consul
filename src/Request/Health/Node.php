<?php
namespace EasySwoole\Consul\Request\Health;

use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\Spl\SplBean;

class Node extends BaseCommand
{
    protected $url = 'health/node/%s';

    /**
     * @var
     */
    protected $node;
    /**
     * @var
     */
    protected $dc;
    /**
     * @var
     */
    protected $filter;

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

    /**
     * @return string|null
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
     * @return string|null
     */
    public function getFilter(): ?string
    {
        return $this->filter;
    }

    /**
     * @param string $filter
     */
    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }
}
