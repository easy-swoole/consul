<?php


namespace EasySwoole\Consul;


class Consul
{
    protected $config;

    protected $kvStore;
    protected $health;


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


}