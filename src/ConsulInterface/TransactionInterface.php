<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:37
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Txn;

interface TransactionInterface
{
    public function create(Txn $txn);
}