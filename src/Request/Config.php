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
    protected string $url = 'config/%s';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var int
     */
    protected ?int $cas = null;
    /**
     * Config Entry Kind ： ['service-defaults', 'proxy-defaults']
     * @var string
     */
    protected ?string $kind = null;
    /**
     * @var string
     */
    protected ?string $name = null;
    /**
     * @var string
     */
    protected ?string $protocol = null;

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
    public function getKind(): ?string
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     */
    public function setKind($kind): void
    {
        $this->kind = $kind;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol($protocol): void
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
