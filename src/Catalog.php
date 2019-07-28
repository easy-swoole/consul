<?php


namespace EasySwoole\Consul;


use EasySwoole\Consul\Request\Catalog\Deregister;
use EasySwoole\Consul\Request\Catalog\Register;

class Catalog extends BaseFunc
{
    function register(Register $register)
    {
        $this->putJSON($register);
    }

    function deregister(Deregister $deregister)
    {
        $this->putJSON($deregister);
    }
}