<?php
namespace EasySwoole\Consul\Request\Agent\Service;

use EasySwoole\Consul\Request\BaseCommand;

class DeRegister extends BaseCommand
{
    protected string $url = 'agent/service/deregister/%s';

    /**
     * @var string
     */
    protected ?string $service_id = null;

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
