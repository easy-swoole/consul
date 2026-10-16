<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:39
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Snapshot;

interface SnapshotInterface
{
    public function generate(Snapshot $snapshot): mixed;

    public function restore(Snapshot $request, string $snapshot): mixed;
}
