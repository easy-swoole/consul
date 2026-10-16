<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Checks extends BaseCommand
{
    protected string $url = 'agent/checks';

    /**
     * @var string
     */
    protected ?string $filter = null;

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
