<?php
namespace EasySwoole\Consul\Request\Agent\Connect;

use EasySwoole\Consul\Request\BaseCommand;

/**
 *sample
 * {
    "Target": "db",
    "ClientCertURI": "spiffe://dc1-7e567ac2-551d-463f-8497-f78972856fc1.consul/ns/default/dc/dc1/svc/web",
    "ClientCertSerial": "04:00:00:00:00:01:15:4b:5a:c3:94"
    }
 * Class Authorize
 * @package EasySwoole\Consul\Request\Agent\Connect
 */
class Authorize extends BaseCommand
{
    protected string $url = 'agent/connect/authorize';

    /**
     * @var string
     */
    protected ?string $target = null;
    /**
     * @var string
     */
    protected ?string $clientCertURI = null;
    /**
     * @var string
     */
    protected ?string $clientCertSerial = null;

    /**
     * @return string
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget($target): void
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getClientCertURI(): ?string
    {
        return $this->clientCertURI;
    }

    /**
     * @param string $clientCertURI
     */
    public function setClientCertURI($clientCertURI): void
    {
        $this->clientCertURI = $clientCertURI;
    }

    /**
     * @return string
     */
    public function getClientCertSerial(): ?string
    {
        return $this->clientCertSerial;
    }

    /**
     * @param string $clientCertSerial
     */
    public function setClientCertSerial($clientCertSerial): void
    {
        $this->clientCertSerial = $clientCertSerial;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Target' => 'target',
            'ClientCertURI' => 'clientCertURI',
            'ClientCertSerial' => 'clientCertSerial',
        ];
    }
}
