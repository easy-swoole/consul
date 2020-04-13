<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:53
 */
namespace EasySwoole\Consul\Request\Session;

use EasySwoole\Consul\Request\BaseCommand;

class Info extends BaseCommand
{
    protected $url = 'session/info/%s';

    /**
     * @var string
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $dc;

    /**
     * @return null|string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

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
