<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 上午12:01
 */
namespace EasySwoole\Consul\Request\Query;

use EasySwoole\Consul\Request\BaseCommand;

class Execute extends BaseCommand
{
    protected $url = 'query/%s/execute';

    /**
     * @var string
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $near;
    /**
     * @var int
     */
    protected $limit;
    /**
     * @var bool
     */
    protected $connect;

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

    /**
     * @return null|string
     */
    public function getNear(): ?string
    {
        return $this->near;
    }

    /**
     * @param string $near
     */
    public function setNear(string $near): void
    {
        $this->near = $near;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return bool|null
     */
    public function getConnect(): ?bool
    {
        return $this->connect;
    }

    /**
     * @param bool $connect
     */
    public function setConnect(bool $connect): void
    {
        $this->connect = $connect;
    }
}
