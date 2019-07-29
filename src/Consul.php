<?php


namespace EasySwoole\Consul;


class Consul
{
    protected $config;

    protected $kvStore;
    protected $health;
    protected $catalog;
    protected $agent;


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

}