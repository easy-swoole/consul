<?php

namespace EasySwoole\Consul\Request\Catalog;


use EasySwoole\Consul\Request\BaseCommand;

class Register extends BaseCommand
{
    public string $url='catalog/register';

    /**
     * @var string
     */
    protected ?string $id = null;
    /**
     * @var string
     */
    protected ?string $node = null;
    /**
     * @var string
     */
    protected ?string $address = null;
    /**
     * @var string
     */
    protected ?string $datacenter = null;
    /**
     * @var array
     */
    protected ?array $taggedAddresses = null;
    /**
     * @var array
     */
    protected ?array $nodeMeta = null;
    /**
     * @var array
     */
    protected ?array $service = null;
    /**
     * @var array
     */
    protected ?array $check = null;
    /**
     * @var boolean
     */
    protected ?bool $skipNodeUpdate = null;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNode(): ?string
    {
        return $this->node;
    }

    /**
     * @param string $node
     */
    public function setNode($node): void
    {
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getDatacenter(): ?string
    {
        return $this->datacenter;
    }

    /**
     * @param string $datacenter
     */
    public function setDatacenter($datacenter): void
    {
        $this->datacenter = $datacenter;
    }

    /**
     * @return array
     */
    public function getTaggedAddresses(): ?array
    {
        return $this->taggedAddresses;
    }

    /**
     * @param array $taggedAddresses
     */
    public function setTaggedAddresses($taggedAddresses): void
    {
        $this->taggedAddresses = $taggedAddresses;
    }

    /**
     * @return array
     */
    public function getNodeMeta(): ?array
    {
        return $this->nodeMeta;
    }

    /**
     * @param array $nodeMeta
     */
    public function setNodeMeta($nodeMeta): void
    {
        $this->nodeMeta = $nodeMeta;
    }

    /**
     * @return array
     */
    public function getService(): ?array
    {
        return $this->service;
    }

    /**
     * @param array $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }

    /**
     * @return array
     */
    public function getCheck(): ?array
    {
        return $this->check;
    }

    /**
     * @param array $check
     */
    public function setCheck($check): void
    {
        $this->check = $check;
    }

    /**
     * @return bool
     */
    public function isSkipNodeUpdate(): ?bool
    {
        return $this->skipNodeUpdate;
    }

    /**
     * @param bool $skipNodeUpdate
     */
    public function setSkipNodeUpdate($skipNodeUpdate): void
    {
        $this->skipNodeUpdate = $skipNodeUpdate;
    }

    protected function setKeyMapping(): array
    {
        return [
            'ID' => 'id',
            'Node' => 'node',
            'Address' => 'address',
            'Datacenter' => 'datacenter',
            'TaggedAddresses' => 'taggedAddresses',
            'NodeMeta' => 'nodeMeta',
            'Service' => 'service',
            'Check' => 'check',
            'SkipNodeUpdate' => 'skipNodeUpdate',
        ];
    }
}
