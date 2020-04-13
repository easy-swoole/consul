<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:55
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Kv;

interface KVStoreInterface
{
    public function kv(Kv $kv);

    public function create(Kv $kv);

    public function update(Kv $kv);

    public function delete(Kv $kv);
}
