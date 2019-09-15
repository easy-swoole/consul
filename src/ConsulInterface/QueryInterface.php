<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午8:44
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Query;
use EasySwoole\Consul\Request\Query\Execute;
use EasySwoole\Consul\Request\Query\Explain;

interface QueryInterface
{
    public function query(Query $query);

    public function readQuery(Query $query);

    public function updateQuery(Query $query);

    public function deleteQuery(Query $query);

    public function execute(Execute $execute);

    public function explain(Explain $explain);
}