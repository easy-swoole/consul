<?php
namespace EasySwoole\Consul\Request\Agent\Connect;

use EasySwoole\Spl\SplBean;

class Authorize extends SplBean
{
    /**
     * sample
     * {
        "Target": "db",
        "ClientCertURI": "spiffe://dc1-7e567ac2-551d-463f-8497-f78972856fc1.consul/ns/default/dc/dc1/svc/web",
        "ClientCertSerial": "04:00:00:00:00:01:15:4b:5a:c3:94"
        }
     * @var string
     */
    protected $Target;
    /**
     * @var string
     */
    protected $ClientCertURI;
    /**
     * @var string
     */
    protected $ClientCertSerial;

    /**
     * @return string|null
     */
    public function getTarget(): ?string
    {
        return $this->Target;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target): void
    {
        $this->Target = $target;
    }

    /**
     * @return string|null
     */
    public function getClientCertURI(): ?string
    {
        return $this->ClientCertURI;
    }

    /**
     * @param string $ClientCertURI
     */
    public function setClientCertURI(string $ClientCertURI): void
    {
        $this->ClientCertURI = $ClientCertURI;
    }

    /**
     * @return string|null
     */
    public function getClientCertSerial(): ?string
    {
        return $this->ClientCertSerial;
    }

    /**
     * @param string $ClientCertSerial
     */
    public function setClientCertSerial(string $ClientCertSerial): void
    {
        $this->ClientCertSerial = $ClientCertSerial;
    }
}