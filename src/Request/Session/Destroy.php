<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:50
 */
namespace EasySwoole\Consul\Request\Session;

use EasySwoole\Spl\SplBean;

class Destroy extends SplBean
{
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