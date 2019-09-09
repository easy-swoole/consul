<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:36
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Txn;

class Transaction extends BaseFunc
{
    /**
     * Create Transaction
     * @param Txn $txn
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function create(Txn $txn)
    {
        $this->putJSON($txn);
    }
}