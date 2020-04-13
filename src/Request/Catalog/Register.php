<?php

namespace EasySwoole\Consul\Request\Catalog;


use EasySwoole\Consul\Request\BaseCommand;

class Register extends BaseCommand
{
    public $url='catalog/register';

    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $node;
    /**
     * @var string
     */
    protected $address;
    /**
     * @var string
     */
    protected $datacenter;
    /**
     * @var array
     */
    protected $taggedAddresses;
    /**
     * @var array
     */
    protected $nodeMeta;
    /**
     * @var array
     */
    protected $service;
    /**
     * @var array
     */
    protected $check;
    /**
     * @var boolean
     */
    protected $skipNodeUpdate;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * @param string $node
     */
    public function setNode($node)
    {
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getDatacenter()
    {
        return $this->datacenter;
    }

    /**
     * @param string $datacenter
     */
    public function setDatacenter($datacenter)
    {
        $this->datacenter = $datacenter;
    }

    /**
     * @return array
     */
    public function getTaggedAddresses()
    {
        return $this->taggedAddresses;
    }

    /**
     * @param array $taggedAddresses
     */
    public function setTaggedAddresses($taggedAddresses)
    {
        $this->taggedAddresses = json_encode($taggedAddresses);
    }

    /**
     * @return array
     */
    public function getNodeMeta()
    {
        return $this->nodeMeta;
    }

    /**
     * @param array $nodeMeta
     */
    public function setNodeMeta($nodeMeta)
    {
        $this->nodeMeta = json_encode($nodeMeta);
    }

    /**
     * @return array
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param array $service
     */
    public function setService($service)
    {
        $this->service = json_encode($service);
    }

    /**
     * @return array
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * @param array $check
     */
    public function setCheck($check)
    {
        $this->check = json_encode($check);
    }

    /**
     * @return bool
     */
    public function isSkipNodeUpdate()
    {
        return $this->skipNodeUpdate;
    }

    /**
     * @param bool $skipNodeUpdate
     */
    public function setSkipNodeUpdate($skipNodeUpdate)
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
