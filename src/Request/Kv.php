<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:56
 */
namespace EasySwoole\Consul\Request;

use EasySwoole\Spl\SplBean;

class Kv extends SplBean
{
    /**
     * @var string
     */
    protected $key;
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var bool
     */
    protected $recurse;
    /**
     * @var bool
     */
    protected $raw;
    /**
     * @var bool
     */
    protected $keys;
    /**
     * @var string
     */
    protected $separator;
    /**
     * @var int
     */
    protected $flags;
    /**
     * @var int
     */
    protected $cas;
    /**
     * @var string
     */
    protected $acquire;
    /**
     * @var string
     */
    protected $release;
    /**
     * @return null|string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
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
     * @return bool|null
     */
    public function getRecurse(): ?bool
    {
        return $this->recurse;
    }

    /**
     * @param bool $recurse
     */
    public function setRecurse(bool $recurse): void
    {
        $this->recurse = $recurse;
    }

    /**
     * @return bool|null
     */
    public function getRaw(): ?bool
    {
        return $this->raw;
    }

    /**
     * @param bool $raw
     */
    public function setRaw(bool $raw): void
    {
        $this->raw = $raw;
    }

    /**
     * @return bool|null
     */
    public function getKeys(): ?bool
    {
        return $this->keys;
    }

    /**
     * @param bool $keys
     */
    public function setKeys(bool $keys): void
    {
        $this->keys = $keys;
    }

    /**
     * @return null|string
     */
    public function getSeparator(): ?string
    {
        return $this->separator;
    }

    /**
     * @param string $separator
     */
    public function setSeparator(string $separator): void
    {
        $this->separator = $separator;
    }

    /**
     * @return int|null
     */
    public function getFlags(): ?int
    {
        return $this->flags;
    }

    /**
     * @param int $flag
     */
    public function setFlags(int $flag): void
    {
        $this->flags = $flag;
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
     *
     */
    public function getAcquire(): ?string 
    {
        return $this->acquire;
    }

    /**
     * @param string $acquire
     *
     */
    public function setAcquire(string $acquire): void 
    {
        $this->acquire = $acquire;
    }

    /**
     * @return null|string
     *
     */
    public function getRelease(): ?string
    {
        return $this->release;
    }

    /**
     * @param string $release
     */
    public function setRelease(string $release): void
    {
        $this->release = $release;
    }
}