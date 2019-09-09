<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午9:13
 */
namespace EasySwoole\Consul\Request\Coordinate;

use EasySwoole\Consul\Request\BaseCommand;

class Datacenters extends BaseCommand
{
    protected $url = 'coordinate/datacenters';
}