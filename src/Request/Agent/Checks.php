<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Spl\SplBean;

class Checks extends SplBean
{
    /**
     * @var string
     */
    protected $filter;

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