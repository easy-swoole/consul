<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:36
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\TransactionInterface;
use EasySwoole\Consul\Request\Txn;

class Transaction extends AbstractEndpoint implements TransactionInterface
{
    /**
     * Create Transaction
     * @param Txn $txn
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function create(Txn $txn): mixed
    {
        return $this->putJson($txn);
    }
}
