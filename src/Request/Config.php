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
        echo 5;
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
    protected $kind;
    /**
     * @var string
     */
    protected $name;
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
        return $this->kind;
    }

    /**
     * @param string $kind
     */
    public function setKind(string $kind): void
    {
        $this->kind = $kind;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}