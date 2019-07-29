<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/30
 * Time: 上午12:58
 */
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Spl\SplBean;

class Services extends SplBean
{
    /**
     * @var string
     */
    protected $filter;

    /**
     * @return null|string
     */
    public function getFilter(): ?string
    {
        return $this->filter;
    }

    /**
     * @param string $filter
     */
    public function setFilter(string $filter): void {
        $this->filter = $filter;
    }
}