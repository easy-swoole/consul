<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午9:19
 */
namespace EasySwoole\Consul\Request\Coordinate;

use EasySwoole\Consul\Request\BaseCommand;

class Nodes extends BaseCommand
{
    protected string $url = 'coordinate/nodes';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var string
     */
    protected ?string $segment = null;
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
