<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午3:50
 */
namespace EasySwoole\Consul\Request;

class Config extends BaseCommand
{
    protected $url = 'config/%s';

    /**
     * @var string
     */
    protected $dc;
    /**
     * @var int
     */
    protected $cas;
    /**
     * Config Entry Kind ： ['service-defaults', 'proxy-defaults']
     * @var string
     */
    protected $kind;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $protocol;

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
     * @return int|null
     */
    public function getCas(): ?int
    {
        return $this->cas;
    }

    /**
     * @param int $cas
     */
    public function setCas(int $cas): void
    {
        $this->cas = $cas;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    public function setKeyMapping(): array
    {
        return [
            'Kind' => 'kind',
            'Name' => 'name',
            'Protocol' => 'protocol',
        ];
    }
}
