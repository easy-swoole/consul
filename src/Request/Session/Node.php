<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:54
 */
namespace EasySwoole\Consul\Request\Session;

use EasySwoole\Consul\Request\BaseCommand;

class Node extends BaseCommand
{
    protected $url = 'session/node/%s';

    /**
     * @var string
     */
    protected $node;
    /**
     * @var string
     */
    protected $dc;

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

    /**
     * @return null|string
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
}