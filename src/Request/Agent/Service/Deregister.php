<?php
namespace EasySwoole\Consul\Request\Agent\Service;

use EasySwoole\Spl\SplBean;

class Deregister extends SplBean
{
    /**
     * @var string
     */
    protected $service_id;

    /**
     * @return string|null
     */
    public function getServiceId(): ?string
    {
        return $this->service_id;
    }

    /**
     * @param string $serviceId
     */
    public function setServiceId(string $serviceId): void
    {
        $this->service_id = $serviceId;
    }
}