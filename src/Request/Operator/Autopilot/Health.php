<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午1:42
 */
namespace EasySwoole\Consul\Request\Operator\Autopilot;

use EasySwoole\Consul\Request\BaseCommand;

class Health extends BaseCommand
{
    protected $url = 'operator/autopilot/health';

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
     * @return null|void
     */
    public function setDc(string $dc): ?string
    {
        $this->dc = $dc;
    }
}
