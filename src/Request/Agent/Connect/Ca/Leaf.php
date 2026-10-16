<?php
namespace EasySwoole\Consul\Request\Agent\Connect\Ca;

use EasySwoole\Consul\Request\BaseCommand;

class Leaf extends BaseCommand
{
    protected string $url = 'agent/connect/ca/leaf/%s';

    /**
     * @var string
     */
    protected ?string $service = null;

    /**
     * @return string
     */
    public function getService(): ?string
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Service' => 'service',
        ];
    }
}
