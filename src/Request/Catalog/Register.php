<?php
namespace EasySwoole\Consul\Request\Catalog;

use EasySwoole\Spl\SplBean;
use EasySwoole\Utility\Random;

class Register extends SplBean
{
    /**
     * @var string
     */
    protected $ID;
    /**
     * @var string
     */
    protected $Node;
    /**
     * @var string
     */
    protected $Address;
    /**
     * @var string
     */
    protected $Datacenter;
    /**
     * @var array
     */
    protected $TaggedAddresses;
    /**
     * @var array
     */
    protected $NodeMeta;
    /**
     * @var array
     */
    protected $Service;
    /**
     * @var array
     */
    protected $Check;
    /**
     * @var boolean
     */
    protected $SkipNodeUpdate;
    /**
     * @return null|string
     */
    public function getID(): ?string
    {
        return $this->ID;
    }
    /**
     * @param string $ID
     */
    public function setID(string $ID): void
    {
        $this->ID = $ID;
    }
    /**
     * @return null|String
     */
    public function getNode(): ?String
    {
        return $this->Node;
    }
    /**
     * @param string $Node
     */
    public function setNode(string $Node): void
    {
        $this->Node = $Node;
    }
    /**
     * @return null|String
     */
    public function getAddress(): ?String
    {
        return $this->Address;
    }
    /**
     * @param string $Address
     */
    public function setAddress(string $Address): void
    {
        $this->Address = $Address;
    }
    /**
     * @return null|string
     */
    public function getDatacenter(): ?string
    {
        return $this->Datacenter;
    }
    /**
     * @param string $DataCenter
     */
    public function setDatacenter(string $Datacenter): void
    {
        $this->DataCenter = $Datacenter;
    }
    /**
     * @return array|null
     */
    public function getTaggedAddresses(): ?array
    {
        return $this->TaggedAddresses;
    }
    /**
     * @param array $TaggedAddresses
     */
    public function setTaggedAddresses(array $TaggedAddresses): void
    {
        $this->TaggedAddresses = $TaggedAddresses;
    }
    /**
     * @return array|null
     */
    public function getNodeMeta(): ?array
    {
        return $this->NodeMeta;
    }
    /**
     * @param array $NodeMeta
     */
    public function setNodeMeta(array $NodeMeta): void
    {
        $this->NodeMeta = $NodeMeta;
    }
    /**
     * @return array|null
     */
    public function getService(): ?array
    {
        return $this->Service;
    }
    /**
     * @param array $Service
     */
    public function setService(array $Service): void
    {
        $this->Service = $Service;
    }
    /**
     * @return array|null
     */
    public function getCheck(): ?array
    {
        return $this->Check;
    }
    /**
     * @param array $Check
     */
    public function setCheck(array $Check): void
    {
        $this->Check = $Check;
    }
    /**
     * @return bool|null
     */
    public function getSkipNodeUpdate(): ?bool
    {
        return $this->SkipNodeUpdate;
    }
    /**
     * @param bool $SkipNodeUpdate
     */
    public function setSkipNodeUpdate(bool $SkipNodeUpdate): void
    {
        $this->SkipNodeUpdate = $SkipNodeUpdate;
    }

    /**
     * initialize ID
     * TODO:uuid的格式还未确定.
     */
    protected function initialize(): void
    {
        if(strlen($this->ID) != 36){
            Random::character(36);
        }
    }
}