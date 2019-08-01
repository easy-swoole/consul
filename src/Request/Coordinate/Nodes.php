<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午9:19
 */
namespace EasySwoole\Consul\Request\Coordinate;

use EasySwoole\Spl\SplBean;

class Nodes extends SplBean
{
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $segment;
    /**
     * @return null|strings
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
     * @return null|string
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