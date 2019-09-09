<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午1:44
 */
namespace EasySwoole\Consul\Request\Operator;

use EasySwoole\Consul\Request\BaseCommand;

class Keyring extends BaseCommand
{
    protected $url = 'operator/keyring';

    /**
     * @var int
     */
    protected $relayFactor;

    /**
     * @var string
     */
    protected $Key;

    /**
     * @var bool
     */
    protected $localOnly;
    /**
     * @return int|null
     */
    public function getRelayFactor() :?int
    {
        return $this->relayFactor;
    }

    /**
     * @param int $relayFactor
     */
    public function setRelayFactor(int $relayFactor): void
    {
        $this->relayFactor = $relayFactor;
    }

    /**
     * @return null|string
     */
    public function getKey(): ?string
    {
        return $this->Key;
    }

    /**
     * @param string $Key
     */
    public function setKey(string $Key): void
    {
        $this->Key = $Key;
    }

    /**
     * @return bool
     */
    public function isLocalOnly ()
    {
        return $this->localOnly;
    }

    /**
     * @param bool $localOnly
     */
    public function setLocalOnly ($localOnly)
    {
        $this->localOnly = $localOnly;
    }

    /**
     * @return array
     */
    public function setKeyMapping(): array
    {
        return [
            'relay-factor' => 'relayFactor',
            'local-only' => 'localOnly',
        ];
    }
}