<?php


namespace EasySwoole\Consul;


use EasySwoole\Consul\Request\Txn;

class Consul
{
    protected $config;

    protected $kvStore;
    protected $health;
    protected $catalog;
    protected $agent;
    protected $acl;
    protected $consulConfig;
    protected $connect;
    protected $coordinates;
    protected $event;
    protected $query;
    protected $session;
    protected $snapshot;
    protected $status;
    protected $txn;
    protected $operator;

    function __construct(Config $config)
    {
        $this->config = $config;
    }


    function kvStore():KVStore
    {
        if(empty($this->kvStore)){
            $this->kvStore = new KVStore($this->config);
        }
        return $this->kvStore;
    }

    function health():Health
    {
        if(empty($this->health)){
            $this->health = new Health($this->config);
        }
        return $this->health;
    }

    function catalog():Catalog
    {
        if(empty($this->catalog)){
            $this->catalog = new Catalog($this->config);
        }
        return $this->catalog;
    }

    function agent():Agent
    {
        if (empty($this->agent)){
            $this->agent = new Agent($this->config);
        }
        return $this->agent;
    }

    function acl():Acl
    {
        if (empty($this->acl)) {
            $this->acl = new Acl($this->config);
        }
        return $this->acl;
    }

    function config():ConsulConfig
    {
        if (empty($this->consulConfig)) {
            $this->consulConfig = new ConsulConfig($this->config);
        }
        return $this->consulConfig;
    }

    function connect():Connect
    {
        if (empty($this->connect)) {
            $this->connect = new Connect($this->config);
        }
        return $this->connect;
    }

    function coordinates():Coordinates
    {
        if (empty($this->coordinates)) {
            $this->coordinates = new Coordinates($this->config);
        }
        return $this->coordinates;
    }

    function event():Event
    {
        if (empty($this->event)) {
            $this->event = new Event($this->config);
        }
        return $this->event;
    }

    function query():Query
    {
        if (empty($this->query)) {
            $this->query = new Query($this->config);
        }
        return $this->query;
    }

    function session():Session
    {
        if (empty($this->session)) {
            $this->session = new Session($this->config);
        }
        return $this->session;
    }

    function snapshot():Snapshot
    {
        if (empty($this->snapshot)) {
            $this->snapshot = new Snapshot($this->config);
        }
        return $this->snapshot;
    }

    function status():Status
    {
        if (empty($this->status)) {
            $this->status = new Status($this->config);
        }
        return $this->status;
    }

    function transaction():Transaction
    {
        if (empty($this->txn)) {
            $this->txn = new Transaction($this->config);
        }
        return $this->txn;
    }

    function operator():Operator
    {
        if (empty($this->operator)) {
            $this->operator = new Operator($this->config);
        }
        return $this->operator;
    }
}