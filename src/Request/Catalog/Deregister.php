<?php
namespace EasySwoole\Consul\Request\Catalog;

use EasySwoole\Spl\SplBean;

class Deregister extends SplBean
{
    /**
     * @var string
     */
    protected $Datacenter;
    /**
     * @var string
     */
    protected $Node;
    /**
     * @var string
     */
    protected $CheckID;
    /**
     * @var string
     */
    protected $ServiceID;

    /**
     * @return string
     */
    public function getDatacenter(): ?string
    {
        return $this->Datacenter;
    }

    /**
     * @param string $Datacenter
     */
    public function setDatacenter(string $Datacenter): void
    {
        $this->Datacenter = $Datacenter;
    }

    /**
     * @return string
     */
    public function getNode(): ?string
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
     * @return string
     */
    public function getCheckID(): ?string
    {
        return $this->CheckID;
    }

    /**
     * @param string $CheckID
     */
    public function setCheckID(string $CheckID): void
    {
        $this->CheckID = $CheckID;
    }

    /**
     * @return string
     */
    public function getServiceID(): ?string
    {
        return $this->ServiceID;
    }

    /**
     * @param string $ServiceID
     */
    public function setServiceID(string $ServiceID): void
    {
        $this->ServiceID = $ServiceID;
    }
}