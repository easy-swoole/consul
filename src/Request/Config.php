<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午3:50
 */
namespace EasySwoole\Consul\Request;

use EasySwoole\Spl\SplBean;

class Config extends SplBean
{
    public function __construct(array $data = null, $autoCreateProperty = false)
    {
        parent::__construct($data, $autoCreateProperty);
    }

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
    protected $Kind;
    /**
     * @var string
     */
    protected $Name;
    /**
     * @var string
     */
    protected $Protocol;

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
     * @return null|string
     */
    public function getKind(): ?string
    {
        return $this->Kind;
    }

    /**
     * @param string $kind
     */
    public function setKind(string $kind): void
    {
        $this->Kind = $kind;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->Name = $name;
    }

    /**
     * @return mixed
     */
    public function getProtocol(): ?string
    {
        return $this->Protocol;
    }

    /**
     * @param mixed $Protocol
     */
    public function setProtocol($Protocol): void
    {
        $this->Protocol = $Protocol;
    }

    public function setKeyMapping(): array
    {
        return [
            'kind' => 'Kind',
            'name' => 'Name'
        ];
    }
}