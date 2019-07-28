<?php


namespace EasySwoole\Consul\Request\Catalog;


use EasySwoole\Spl\SplBean;
use EasySwoole\Utility\Random;

class Register extends SplBean
{
    protected $ID;
    protected $Node;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getNode()
    {
        return $this->Node;
    }

    /**
     * @param mixed $Node
     */
    public function setNode($Node): void
    {
        $this->Node = $Node;
    }


    protected function initialize(): void
    {
        if(strlen($this->ID) != 36){
            Random::character(36);
        }
    }
}