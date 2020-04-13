<?php
namespace EasySwoole\Consul;

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

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function kvStore():KVStore
    {
        if (empty($this->kvStore)) {
            $this->kvStore = new KVStore($this->config);
        }
        return $this->kvStore;
    }

    public function health():Health
    {
        if (empty($this->health)) {
            $this->health = new Health($this->config);
        }
        return $this->health;
    }

    public function catalog():Catalog
    {
        if (empty($this->catalog)) {
            $this->catalog = new Catalog($this->config);
        }
        return $this->catalog;
    }

    public function agent():Agent
    {
        if (empty($this->agent)) {
            $this->agent = new Agent($this->config);
        }
        return $this->agent;
    }

    public function acl():Acl
    {
        if (empty($this->acl)) {
            $this->acl = new Acl($this->config);
        }
        return $this->acl;
    }

    public function config():ConsulConfig
    {
        if (empty($this->consulConfig)) {
            $this->consulConfig = new ConsulConfig($this->config);
        }
        return $this->consulConfig;
    }

    public function connect():Connect
    {
        if (empty($this->connect)) {
            $this->connect = new Connect($this->config);
        }
        return $this->connect;
    }

    public function coordinates():Coordinates
    {
        if (empty($this->coordinates)) {
            $this->coordinates = new Coordinates($this->config);
        }
        return $this->coordinates;
    }

    public function event():Event
    {
        if (empty($this->event)) {
            $this->event = new Event($this->config);
        }
        return $this->event;
    }

    public function query():Query
    {
        if (empty($this->query)) {
            $this->query = new Query($this->config);
        }
        return $this->query;
    }

    public function session():Session
    {
        if (empty($this->session)) {
            $this->session = new Session($this->config);
        }
        return $this->session;
    }

    public function snapshot():Snapshot
    {
        if (empty($this->snapshot)) {
            $this->snapshot = new Snapshot($this->config);
        }
        return $this->snapshot;
    }

    public function status():Status
    {
        if (empty($this->status)) {
            $this->status = new Status($this->config);
        }
        return $this->status;
    }

    public function transaction():Transaction
    {
        if (empty($this->txn)) {
            $this->txn = new Transaction($this->config);
        }
        return $this->txn;
    }

    public function operator():Operator
    {
        if (empty($this->operator)) {
            $this->operator = new Operator($this->config);
        }
        return $this->operator;
    }
}
