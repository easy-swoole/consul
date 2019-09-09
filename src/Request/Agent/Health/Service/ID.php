<?php
namespace EasySwoole\Consul\Request\Agent\Health\Service;

use EasySwoole\Consul\Request\BaseCommand;

class ID extends BaseCommand
{
    protected $url = 'agent/health/service/id/%s';

    /**
     * @var string
     */
    protected $service_id;
    /**
     * @var string
     */
    protected $format;
    /**
     * @return string|null
     */
    public function getServiceID(): ?string
    {
        return $this->service_id;
    }

    /**
     * @param string $serviceName
     */
    public function setServiceID(string $service_id): void
    {
        $this->service_id = $service_id;
    }

    /**
     * @return string|null
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }
}