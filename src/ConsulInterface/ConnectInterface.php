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
    public function roots(Roots $roots): mixed;

    public function configuration(Configuration $configuration): mixed;

    public function updateConfiguration(Configuration $configuration): mixed;

    public function intentions(Intentions $intentions): mixed;

    public function readIntention(Intentions $intentions): mixed;

    public function listIntention(Intentions $intentions): mixed;

    public function updateIntention(Intentions $intentions): mixed;

    public function deleteIntention(Intentions $intentions): mixed;

    public function check(Intentions\Check $check): mixed;

    public function match(Intentions\IntentionMatch $match): mixed;
}
