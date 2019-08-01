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
}