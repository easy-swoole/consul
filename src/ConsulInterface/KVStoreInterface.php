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
    public function read(Kv $request): mixed;

    public function put(Kv $request, string $value): mixed;

    public function delete(Kv $request): mixed;
}
