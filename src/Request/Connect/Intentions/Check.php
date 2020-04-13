<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午8:01
 */
namespace EasySwoole\Consul\Request\Connect\Intentions;

use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\Spl\SplBean;

class Check extends BaseCommand
{
    protected $url = 'connect/intentions/check';

    /**
     * @var string
     */
    protected $source;
    /**
     * @var string
     */
    protected $destination;

    /**
     * @return null|string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return null|string
     */
    public function getDestination(): ?string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination(string $destination): void
    {
        $this->destination = $destination;
    }
}
