<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:31
 */
namespace EasySwoole\Consul\Request\Status;

use EasySwoole\Consul\Request\BaseCommand;

class Peers extends BaseCommand
{
    protected $url = 'status/peers';

    /**
     * @var string
     */
    protected $dc;

    /**
     * @return null|string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc(string $dc): void
    {
        $this->dc = $dc;
    }
}