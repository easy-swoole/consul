<?php
namespace EasySwoole\Consul\Request\Catalog;

use EasySwoole\Consul\Request\BaseCommand;

class Connect extends BaseCommand
{
    public $url='catalog/connect/%s';

    /**
     * @var
     */
    protected $service;
    /**
     * @var
     */
    protected $dc;
    /**
     * @var
     */
    protected $tag;
    /**
     * @var
     */
    protected $near;
    /**
     * @var
     */
    protected $node_meta;
    /**
     * @var
     */
    protected $filter;

    /**
     * @return string|null
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

    /**
     * @return string|null
     */
    public function getNear(): ?string
    {
        return $this->near;
    }

    /**
     * @param string $near
     */
    public function setNear(string $near): void
    {
        $this->near = $near;
    }

    /**
     * @return string|null
     */
    public function getNodeMeta(): ?string
    {
        return $this->node_meta;
    }

    /**
     * @param string $nodeMeta
     */
    public function setNodeMeat(string $nodeMeta): void
    {
        $this->node_meta = $nodeMeta;
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

    /**
     * convert node_meta to node-meta
     * @return array
     */
    public function setKeyMapping(): array
    {
        return ['node-meta' => 'node_meta'];
    }
}