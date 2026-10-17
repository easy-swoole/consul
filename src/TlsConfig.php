<?php
declare(strict_types=1);

namespace EasySwoole\Consul;

use EasySwoole\HttpClient\HttpClient;
use InvalidArgumentException;

final class TlsConfig
{
    public function __construct(
        public readonly bool $verifyPeer = true,
        public readonly bool $allowSelfSigned = false,
        public readonly ?string $caFile = null,
        public readonly ?string $caPath = null,
        public readonly ?string $clientCertificate = null,
        public readonly ?string $clientPrivateKey = null,
        public readonly ?string $passphrase = null,
        public readonly ?string $serverName = null
    ) {
        if ($allowSelfSigned && !$verifyPeer) {
            throw new InvalidArgumentException('allowSelfSigned requires verifyPeer to be enabled.');
        }
        if (($clientCertificate === null) !== ($clientPrivateKey === null)) {
            throw new InvalidArgumentException(
                'clientCertificate and clientPrivateKey must be configured together.'
            );
        }
        if ($passphrase !== null && $clientPrivateKey === null) {
            throw new InvalidArgumentException('passphrase requires a client private key.');
        }

        foreach ([
            'caFile' => $caFile,
            'caPath' => $caPath,
            'clientCertificate' => $clientCertificate,
            'clientPrivateKey' => $clientPrivateKey,
            'serverName' => $serverName,
        ] as $name => $value) {
            if ($value !== null && trim($value) === '') {
                throw new InvalidArgumentException("{$name} cannot be empty.");
            }
        }
    }

    public function applyTo(HttpClient $client): void
    {
        // 始终显式设置证书校验策略，避免依赖底层客户端不同版本的默认值。
        $client->setSslVerifyPeer($this->verifyPeer, $this->allowSelfSigned);

        if ($this->serverName !== null) {
            $client->setSslHostName($this->serverName);
        }
        if ($this->caFile !== null) {
            $client->setSslCafile($this->caFile);
        }
        if ($this->caPath !== null) {
            $client->setSslCapath($this->caPath);
        }
        if ($this->clientCertificate !== null && $this->clientPrivateKey !== null) {
            $client->setSslCertFile($this->clientCertificate);
            $client->setSslKeyFile($this->clientPrivateKey);
        }
        if ($this->passphrase !== null) {
            $client->setSslPassphrase($this->passphrase);
        }
    }
}
