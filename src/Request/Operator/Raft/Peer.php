<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午3:07
 */
namespace EasySwoole\Consul\Request\Operator\Raft;

use EasySwoole\Consul\Request\BaseCommand;

class Peer extends BaseCommand
{
    protected $url = 'operator/raft/peer';

    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $address;

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
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}