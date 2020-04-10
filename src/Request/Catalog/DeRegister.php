<?php
namespace EasySwoole\Consul\Request\Catalog;

use EasySwoole\Consul\Request\BaseCommand;

class DeRegister extends BaseCommand
{
    public $url='catalog/deregister';

    /**
     * @var string
     */
    protected $datacenter;
    /**
     * @var string
     */
    protected $node;
    /**
     * @var string
     */
    protected $checkID;
    /**
     * @var string
     */
    protected $serviceID;

    /**
     * @return string
     */
    public function getDatacenter ()
    {
        return $this->datacenter;
    }

    /**
     * @param string $datacenter
     */
    public function setDatacenter ($datacenter)
    {
        $this->datacenter = $datacenter;
    }

    /**
     * @return string
     */
    public function getNode ()
    {
        return $this->node;
    }

    /**
     * @param string $node
     */
    public function setNode ($node)
    {
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function getCheckID ()
    {
        return $this->checkID;
    }

    /**
     * @param string $checkID
     */
    public function setCheckID ($checkID)
    {
        $this->checkID = $checkID;
    }

    /**
     * @return string
     */
    public function getServiceID ()
    {
        return $this->serviceID;
    }

    /**
     * @param string $serviceID
     */
    public function setServiceID ($serviceID)
    {
        $this->serviceID = $serviceID;
    }

    protected function setKeyMapping (): array
    {
        return [
            'Node' => 'node',
            'Datacenter' => 'datacenter',
            'CheckID' => 'checkID',
            'ServiceID' => 'serviceID',
        ];
    }
}