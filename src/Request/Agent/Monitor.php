<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Monitor extends BaseCommand
{
    protected $url = 'agent/monitor';

    /**
     * Specifies a text string containing a log level to filter on, such as info
     * @var string
     */
    protected $loglevel;

    /**
     * @return string
     */
    public function getLoglevel(): string
    {
        return $this->loglevel;
    }

    /**
     * @param string $loglevel
     */
    public function setLoglevel(string $loglevel): void
    {
        $this->loglevel = $loglevel;
    }
}