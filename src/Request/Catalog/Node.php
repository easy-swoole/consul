<?php
namespace EasySwoole\Consul\Request\Catalog;

use EasySwoole\Consul\Request\BaseCommand;

class Node extends BaseCommand
{
    public string $url='catalog/node/%s';

    /**
     * @var
     */
    protected ?string $node = null;
    /**
     * @var
     */
    protected ?string $dc = null;
    /**
     * @var
     */
    protected ?string $filter = null;

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
