<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Spl\SplBean;

class Metrics extends SplBean
{
    /**
     * only can set prometheus
     * @var string
     */
    protected $format;

    /**
     * @return string
     */
    public function getFormat(): string
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