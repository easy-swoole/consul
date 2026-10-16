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
    protected string $url = 'coordinate/node/%s';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var string
     */
    protected ?string $segment = null;
    /**
     * @var string
     */
    protected ?string $node = null;
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
