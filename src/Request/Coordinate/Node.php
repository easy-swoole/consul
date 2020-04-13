<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:01
 */
namespace EasySwoole\Consul\Request\Coordinate;

use EasySwoole\Consul\Request\BaseCommand;

class Node extends BaseCommand
{
    protected $url = 'coordinate/node/%s';

    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $segment;
    /**
     * @var string
     */
    protected $node;
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

    /**
     * @return null|string
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
