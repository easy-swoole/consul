<?php
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Consul\Request\BaseCommand;

class Register extends BaseCommand
{
    protected $url = 'agent/check/register';

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
    protected $name;
    /**
     * @var string
     */
    protected $ID;
    /**
     * @var string
     */
    protected $interval;
    /**
     * @var string
     */
    protected $notes;
    /**
     * @var string
     */
    protected $deregisterCriticalServiceAfter;
    /**
     * @var array<string>
     */
    protected $args;
    /**
     * @var string
     */
    protected $aliasNode;
    /**
     * @var string
     */
    protected $aliasService;
    /**
     * @var string
     */
    protected $dockerContainerID;
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
    protected $method;
    /**
     * @var map[string][]string: {}
     */
    protected $header;
    /**
     * @var string duration such as 10s,5m
     */
    protected $timeout;
    /**
     * @var int positive int: 4096
     */
    protected $outputMaxSize;
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
    protected $serviceID;
    /**
     * @var string
     */
    protected $status;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param string $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getDeregisterCriticalServiceAfter()
    {
        return $this->deregisterCriticalServiceAfter;
    }

    /**
     * @param string $deregisterCriticalServiceAfter
     */
    public function setDeregisterCriticalServiceAfter($deregisterCriticalServiceAfter)
    {
        $this->deregisterCriticalServiceAfter = $deregisterCriticalServiceAfter;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @param array $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }

    /**
     * @return string
     */
    public function getAliasNode()
    {
        return $this->aliasNode;
    }

    /**
     * @param string $aliasNode
     */
    public function setAliasNode($aliasNode)
    {
        $this->aliasNode = $aliasNode;
    }

    /**
     * @return string
     */
    public function getAliasService()
    {
        return $this->aliasService;
    }

    /**
     * @param string $aliasService
     */
    public function setAliasService($aliasService)
    {
        $this->aliasService = $aliasService;
    }

    /**
     * @return string
     */
    public function getDockerContainerID()
    {
        return $this->dockerContainerID;
    }

    /**
     * @param string $dockerContainerID
     */
    public function setDockerContainerID($dockerContainerID)
    {
        $this->dockerContainerID = $dockerContainerID;
    }

    /**
     * @return string
     */
    public function getGRPC()
    {
        return $this->GRPC;
    }

    /**
     * @param string $GRPC
     */
    public function setGRPC($GRPC)
    {
        $this->GRPC = $GRPC;
    }

    /**
     * @return bool
     */
    public function isGRPCUseTLS()
    {
        return $this->GRPCUseTLS;
    }

    /**
     * @param bool $GRPCUseTLS
     */
    public function setGRPCUseTLS($GRPCUseTLS)
    {
        $this->GRPCUseTLS = $GRPCUseTLS;
    }

    /**
     * @return string
     */
    public function getHTTP()
    {
        return $this->HTTP;
    }

    /**
     * @param string $HTTP
     */
    public function setHTTP($HTTP)
    {
        $this->HTTP = $HTTP;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return map
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param map $header
     */
    public function setHeader($header)
    {
        $this->header = json_encode($header);
    }

    /**
     * @return string
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param string $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @return int
     */
    public function getOutputMaxSize()
    {
        return $this->outputMaxSize;
    }

    /**
     * @param int $outputMaxSize
     */
    public function setOutputMaxSize($outputMaxSize)
    {
        $this->outputMaxSize = $outputMaxSize;
    }

    /**
     * @return bool
     */
    public function isTLSSkipVerify()
    {
        return $this->TLSSkipVerify;
    }

    /**
     * @param bool $TLSSkipVerify
     */
    public function setTLSSkipVerify($TLSSkipVerify)
    {
        $this->TLSSkipVerify = $TLSSkipVerify;
    }

    /**
     * @return string
     */
    public function getTCP()
    {
        return $this->TCP;
    }

    /**
     * @param string $TCP
     */
    public function setTCP($TCP)
    {
        $this->TCP = $TCP;
    }

    /**
     * @return string
     */
    public function getTTL()
    {
        return $this->TTL;
    }

    /**
     * @param string $TTL
     */
    public function setTTL($TTL)
    {
        $this->TTL = $TTL;
    }

    /**
     * @return string
     */
    public function getServiceID()
    {
        return $this->serviceID;
    }

    /**
     * @param string $serviceID
     */
    public function setServiceID($serviceID)
    {
        $this->serviceID = $serviceID;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
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
