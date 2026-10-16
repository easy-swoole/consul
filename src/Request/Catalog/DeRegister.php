<?php
namespace EasySwoole\Consul\Request\Catalog;

use EasySwoole\Consul\Request\BaseCommand;

class DeRegister extends BaseCommand
{
    public string $url='catalog/deregister';

    /**
     * @var string
     */
    protected ?string $datacenter = null;
    /**
     * @var string
     */
    protected ?string $node = null;
    /**
     * @var string
     */
    protected ?string $checkID = null;
    /**
     * @var string
     */
    protected ?string $serviceID = null;

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
    public function getCheckID(): ?string
    {
        return $this->checkID;
    }

    /**
     * @param string $checkID
     */
    public function setCheckID($checkID): void
    {
        $this->checkID = $checkID;
    }

    /**
     * @return string
     */
    public function getServiceID(): ?string
    {
        return $this->serviceID;
    }

    /**
     * @param string $serviceID
     */
    public function setServiceID($serviceID): void
    {
        $this->serviceID = $serviceID;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Node' => 'node',
            'Datacenter' => 'datacenter',
            'CheckID' => 'checkID',
            'ServiceID' => 'serviceID',
        ];
    }
}
