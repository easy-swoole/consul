<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 上午12:14
 */
namespace EasySwoole\Consul\Request\Query;

use EasySwoole\Consul\Request\BaseCommand;

class Explain extends BaseCommand
{
    protected $url = 'query/%s/explain';

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