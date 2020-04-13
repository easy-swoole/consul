<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午9:08
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Connect\Ca\Configuration;
use EasySwoole\Consul\Request\Connect\Ca\Roots;
use EasySwoole\Consul\Request\Connect\Intentions;

interface ConnectInterface
{
    public function roots(Roots $roots);

    public function configuration(Configuration $configuration);

    public function updateConfiguration(Configuration $configuration);

    public function intentions(Intentions $intentions);

    public function readIntention(Intentions $intentions);

    public function listIntention(Intentions $intentions);

    public function updateIntention(Intentions $intentions);

    public function deleteIntention(Intentions $intentions);

    public function check(Intentions\Check $check);

    public function match(Intentions\Match $match);
}
