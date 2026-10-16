<?php
namespace EasySwoole\Consul\Request\Catalog;

use EasySwoole\Consul\Request\BaseCommand;

class Services extends BaseCommand
{
    public string $url='catalog/services';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var string
     */
    protected ?string $node_meta = null;

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
    public function setNodeMeta(string $nodeMeta): void
    {
        $this->node_meta = $nodeMeta;
    }

    /**
     * convert node_meta to node-meta
     * @return array
     */
    protected function setKeyMapping(): array
    {
        return ['node-meta' => 'node_meta'];
    }
}
