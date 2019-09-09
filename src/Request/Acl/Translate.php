<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午1:08
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class Translate extends BaseCommand
{
    protected $url = 'acl/rules/translate/%s';

    protected $accessor_id;

    /**
     * @return mixed
     */
    public function getAccessorId ()
    {
        return $this->accessor_id;
    }

    /**
     * @param mixed $accessor_id
     */
    public function setAccessorId ($accessor_id)
    {
        $this->accessor_id = $accessor_id;
    }
}