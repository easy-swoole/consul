<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:50
 */
namespace EasySwoole\Consul\Request\Event;

use EasySwoole\Consul\Request\BaseCommand;

class ListEvent extends BaseCommand
{
    protected $url = 'event/list';

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $node;
    /**
     * @var string
     */
    protected $service;
    /**
     * @var string
     */
    protected $tag;
    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return null|void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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

    /**
     * @return null|string
     */
    public function getService(): ?string
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService(string $service): void
    {
        $this->service = $service;
    }

    /**
     * @return null|string
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }
}