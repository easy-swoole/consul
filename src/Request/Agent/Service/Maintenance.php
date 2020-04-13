<?php
namespace EasySwoole\Consul\Request\Agent\Service;

use EasySwoole\Consul\Request\BaseCommand;

class Maintenance extends BaseCommand
{
    protected $url = 'agent/service/maintenance/%s';

    /**
     * @var string
     */
    protected $service_id;
    /**
     * @var bool
     */
    protected $enable;
    /**
     * @var string
     */
    protected $reason;

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

    /**
     * @return bool|null
     */
    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    /**
     * @param bool $enable
     */
    public function setEnable(bool $enable): void
    {
        $this->enable = $enable;
    }

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }
}
