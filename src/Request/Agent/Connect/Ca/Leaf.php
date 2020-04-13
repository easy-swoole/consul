<?php
namespace EasySwoole\Consul\Request\Agent\Connect\Ca;

use EasySwoole\Consul\Request\BaseCommand;

class Leaf extends BaseCommand
{
    protected $url = 'agent/connect/ca/leaf/%s';

    /**
     * @var string
     */
    protected $service;

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService($service)
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
