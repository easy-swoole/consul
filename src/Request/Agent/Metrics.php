<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Metrics extends BaseCommand
{
    protected string $url = 'agent/metrics';

    /**
     * only can set prometheus
     * @var string
     */
    protected ?string $format = null;

    /**
     * @return string
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
