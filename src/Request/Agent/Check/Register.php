<?php
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Spl\SplBean;

class Register extends SplBean
{
    /**
     * Sample
     * {
        "ID": "mem",
        "Name": "Memory utilization",
        "Notes": "Ensure we don't oversubscribe memory",
        "DeregisterCriticalServiceAfter": "90m",
        "Args": ["/usr/local/bin/check_mem.py"],
        "DockerContainerID": "f972c95ebf0e",
        "Shell": "/bin/bash",
        "HTTP": "https://example.com",
        "Method": "POST",
        "Header": {"x-foo":["bar", "baz"]},
        "TCP": "example.com:22",
        "Interval": "10s",
        "TTL": "15s",
        "TLSSkipVerify": true
    }
     */

    /**
     * @var string
     */
    protected $Name;
    /**
     * @var string
     */
    protected $ID;
    /**
     * @var string
     */
    protected $Interval;
    /**
     * @var string
     */
    protected $Notes;
    /**
     * @var string
     */
    protected $DeregisterCriticalServiceAfter;
    /**
     * @var array<string>
     */
    protected $Args;
    /**
     * @var string
     */
    protected $AliasNode;
    /**
     * @var string
     */
    protected $AliasService;
    /**
     * @var string
     */
    protected $DockerContainerID;
    /**
     * @var string
     */
    protected $GRPC;
    /**
     * @var bool
     */
    protected $GRPCUseTLS;
    /**
     * @var string
     */
    protected $HTTP;
    /**
     * @var string
     */
    protected $Method;
    /**
     * @var map[string][]string: {}
     */
    protected $Header;
    /**
     * @var string duration such as 10s,5m
     */
    protected $Timeout;
    /**
     * @var int positive int: 4096
     */
    protected $OutputMaxSize;
    /**
     * @var bool
     */
    protected $TLSSkipVerify;
    /**
     * @var string
     */
    protected $TCP;
    /**
     * @var string
     */
    protected $TTL;
    /**
     * @var string
     */
    protected $ServiceID;
    /**
     * @var string
     */
    protected $Status;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return string|null
     */
    public function getID(): ?string
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     */
    public function setId(string $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->Interval;
    }

    /**
     * @param string $Interval
     */
    public function setInterval(string $Interval): void
    {
        $this->Interval = $Interval;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    /**
     * @param string $Notes
     */
    public function setNotes(string $Notes): void
    {
        $this->Notes = $Notes;
    }

    /**
     * @return string|null
     */
    public function getDeregisterCriticalServiceAfter(): ?string
    {
        return $this->DeregisterCriticalServiceAfter;
    }

    /**
     * @param string $DeregisterCriticalServiceAfter
     */
    public function setDeregisterCriticalServiceAfter(string $DeregisterCriticalServiceAfter): void
    {
        $this->DeregisterCriticalServiceAfter = $DeregisterCriticalServiceAfter;
    }

    /**
     * @return array|null
     */
    public function getArgs(): ?array {
        return $this->Args;
    }

    /**
     * @param string $Args
     */
    public function setArgs(string $Args): void
    {
        $this->Args = $Args;
    }

    /**
     * @return string|null
     */
    public function getAliasNode(): ?string
    {
        return $this->AliasNode;
    }

    /**
     * @param string $AliasNode
     */
    public function setAliasNode(string $AliasNode): void
    {
        $this->AliasNode = $AliasNode;
    }

    /**
     * @return string|null
     */
    public function getAliasService(): ?string
    {
        return $this->AliasService;
    }

    /**
     * @param string $AliasService
     */
    public function setAliasService(string $AliasService): void {
        $this->AliasService = $AliasService;
    }

    /**
     * @return string|null
     */
    public function getDockerContainerID(): ?string
    {
        return $this->DockerContainerID;
    }

    /**
     * @param string $DockerContainerID
     */
    public function setDockerContainerID(string $DockerContainerID): void
    {
        $this->DockerContainerID = $DockerContainerID;
    }

    /**
     * @return string|null
     */
    public function getGRPC(): ?string
    {
        return $this->GRPC;
    }

    /**
     * @param string $GRPC
     */
    public function setGRPC(string $GRPC): void
    {
        $this->GRPC = $GRPC;
    }

    /**
     * @return bool|null
     */
    public function getGRPCUseTLS(): ?bool
    {
        return $this->GRPCUseTLS;
    }

    /**
     * @param string $GRPCUseTLS
     */
    public function setGRPCUseTLS(string $GRPCUseTLS): void
    {
        $this->GRPCUseTLS = $GRPCUseTLS;
    }

    /**
     * @return string|null
     */
    public function getHTTP(): ?string
    {
        $this->HTTP;
    }

    /**
     * @param string $HTTP
     */
    public function setHTTP(string $HTTP): void
    {
        $this->HTTP = $HTTP;
    }

    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->Method;
    }

    /**
     * @param string $Method
     */
    public function setMethod(string $Method): void
    {
        $this->Method = $Method;
    }

    /**
     * @return string|null
     */
    public function getHeader(): ?string
    {
        return $this->Header;
    }

    /**
     * @param string $Header
     */
    public function setHeader(string $Header): void
    {
        $this->Header = $Header;
    }

    /**
     * @return string|null
     */
    public function getTimeout(): ?string
    {
        return $this->Timeout;
    }

    /**
     * @param string $Timeout
     */
    public function setTimeout(string $Timeout): void
    {
        $this->Timeout = $Timeout;
    }

    /**
     * @return string|null
     */
    public function getOutputMaxSize(): ?string
    {
        return $this->OutputMaxSize;
    }

    /**
     * @param string $OutputMaxSize
     */
    public function setOutputMaxSize(string  $OutputMaxSize): void
    {
        $this->OutputMaxSize = $OutputMaxSize;
    }

    /**
     * @return bool|null
     */
    public function getTLSSkipVerify(): ?bool
    {
        return $this->TLSSkipVerify;
    }

    /**
     * @param bool $TLSSkipVerify
     */
    public function setTLSSkipVerify(bool $TLSSkipVerify): void
    {
        $this->TLSSkipVerify = $TLSSkipVerify;
    }

    /**
     * @return string|null
     */
    public function getTCP(): ?string
    {
        return $this->TCP;
    }

    /**
     * @param string $TCP
     */
    public function setTCP(string $TCP): void
    {
        $this->TCP = $TCP;
    }

    /**
     * @return string|null
     */
    public function getTTL(): ?string
    {
        return $this->TTL;
    }

    /**
     * @param string $TTL
     */
    public function setTTL(string $TTL): void
    {
        $this->TTL = $TTL;
    }

    /**
     * @return string|null
     */
    public function getServiceID(): ?string
    {
        return $this->ServiceID;
    }

    /**
     * @param string $ServiceID
     */
    public function setServiceID(string $ServiceID): void
    {
        $this->ServiceID = $ServiceID;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     */
    public function setStatus(string $Status): void
    {
        $this->Status = $Status;
    }
}