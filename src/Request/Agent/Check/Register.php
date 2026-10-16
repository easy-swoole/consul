<?php
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Consul\Request\BaseCommand;

class Register extends BaseCommand
{
    protected string $url = 'agent/check/register';

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
    protected ?string $name = null;
    /**
     * @var string
     */
    protected ?string $ID = null;
    /**
     * @var string
     */
    protected ?string $interval = null;
    /**
     * @var string
     */
    protected ?string $notes = null;
    /**
     * @var string
     */
    protected ?string $deregisterCriticalServiceAfter = null;
    /**
     * @var array<string>
     */
    protected ?array $args = null;
    /**
     * @var string
     */
    protected ?string $aliasNode = null;
    /**
     * @var string
     */
    protected ?string $aliasService = null;
    /**
     * @var string
     */
    protected ?string $dockerContainerID = null;
    /**
     * @var string
     */
    protected ?string $GRPC = null;
    /**
     * @var bool
     */
    protected ?bool $GRPCUseTLS = null;
    /**
     * @var string
     */
    protected ?string $HTTP = null;
    /**
     * @var string
     */
    protected ?string $method = null;
    /**
     * @var map[string][]string: {}
     */
    protected ?array $header = null;
    /**
     * @var string duration such as 10s,5m
     */
    protected ?string $timeout = null;
    /**
     * @var int positive int: 4096
     */
    protected ?int $outputMaxSize = null;
    /**
     * @var bool
     */
    protected ?bool $TLSSkipVerify = null;
    /**
     * @var string
     */
    protected ?string $TCP = null;
    /**
     * @var string
     */
    protected ?string $TTL = null;
    /**
     * @var string
     */
    protected ?string $serviceID = null;
    /**
     * @var string
     */
    protected ?string $status = null;

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
    public function getID(): ?string
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * @param string $interval
     */
    public function setInterval($interval): void
    {
        $this->interval = $interval;
    }

    /**
     * @return string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getDeregisterCriticalServiceAfter(): ?string
    {
        return $this->deregisterCriticalServiceAfter;
    }

    /**
     * @param string $deregisterCriticalServiceAfter
     */
    public function setDeregisterCriticalServiceAfter($deregisterCriticalServiceAfter): void
    {
        $this->deregisterCriticalServiceAfter = $deregisterCriticalServiceAfter;
    }

    /**
     * @return array
     */
    public function getArgs(): ?array
    {
        return $this->args;
    }

    /**
     * @param array $args
     */
    public function setArgs($args): void
    {
        $this->args = $args;
    }

    /**
     * @return string
     */
    public function getAliasNode(): ?string
    {
        return $this->aliasNode;
    }

    /**
     * @param string $aliasNode
     */
    public function setAliasNode($aliasNode): void
    {
        $this->aliasNode = $aliasNode;
    }

    /**
     * @return string
     */
    public function getAliasService(): ?string
    {
        return $this->aliasService;
    }

    /**
     * @param string $aliasService
     */
    public function setAliasService($aliasService): void
    {
        $this->aliasService = $aliasService;
    }

    /**
     * @return string
     */
    public function getDockerContainerID(): ?string
    {
        return $this->dockerContainerID;
    }

    /**
     * @param string $dockerContainerID
     */
    public function setDockerContainerID($dockerContainerID): void
    {
        $this->dockerContainerID = $dockerContainerID;
    }

    /**
     * @return string
     */
    public function getGRPC(): ?string
    {
        return $this->GRPC;
    }

    /**
     * @param string $GRPC
     */
    public function setGRPC($GRPC): void
    {
        $this->GRPC = $GRPC;
    }

    /**
     * @return bool
     */
    public function isGRPCUseTLS(): ?bool
    {
        return $this->GRPCUseTLS;
    }

    /**
     * @param bool $GRPCUseTLS
     */
    public function setGRPCUseTLS($GRPCUseTLS): void
    {
        $this->GRPCUseTLS = $GRPCUseTLS;
    }

    /**
     * @return string
     */
    public function getHTTP(): ?string
    {
        return $this->HTTP;
    }

    /**
     * @param string $HTTP
     */
    public function setHTTP($HTTP): void
    {
        $this->HTTP = $HTTP;
    }

    /**
     * @return string
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method): void
    {
        $this->method = $method;
    }

    /**
     * @return map
     */
    public function getHeader(): ?array
    {
        return $this->header;
    }

    /**
     * @param map $header
     */
    public function setHeader($header): void
    {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getTimeout(): ?string
    {
        return $this->timeout;
    }

    /**
     * @param string $timeout
     */
    public function setTimeout($timeout): void
    {
        $this->timeout = $timeout;
    }

    /**
     * @return int
     */
    public function getOutputMaxSize(): ?int
    {
        return $this->outputMaxSize;
    }

    /**
     * @param int $outputMaxSize
     */
    public function setOutputMaxSize($outputMaxSize): void
    {
        $this->outputMaxSize = $outputMaxSize;
    }

    /**
     * @return bool
     */
    public function isTLSSkipVerify(): ?bool
    {
        return $this->TLSSkipVerify;
    }

    /**
     * @param bool $TLSSkipVerify
     */
    public function setTLSSkipVerify($TLSSkipVerify): void
    {
        $this->TLSSkipVerify = $TLSSkipVerify;
    }

    /**
     * @return string
     */
    public function getTCP(): ?string
    {
        return $this->TCP;
    }

    /**
     * @param string $TCP
     */
    public function setTCP($TCP): void
    {
        $this->TCP = $TCP;
    }

    /**
     * @return string
     */
    public function getTTL(): ?string
    {
        return $this->TTL;
    }

    /**
     * @param string $TTL
     */
    public function setTTL($TTL): void
    {
        $this->TTL = $TTL;
    }

    /**
     * @return string
     */
    public function getServiceID(): ?string
    {
        return $this->serviceID;
    }

    /**
     * @param string $serviceID
     */
    public function setServiceID($serviceID): void
    {
        $this->serviceID = $serviceID;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Name'          => 'name',
            'ID'            => 'id',
            'Interval'      => 'interval',
            'Notes'         => 'notes',
            'DeregisterCriticalServiceAfter'    => 'deregisterCriticalServiceAfter',
            'Args'          => 'args',
            'AliasNode'     => 'aliasNode',
            'AliasService'  => 'aliasService',
            'DockerContainerID'                 => 'dockerContainerID',
            'Method'        => 'method',
            'Header'        => 'header',
            'Timeout'       => 'timeout',
            'OutputMaxSize' => 'outputMaxSize',
            'ServiceID'     => 'serviceID',
            'Status'        => 'status',
        ];
    }
}
