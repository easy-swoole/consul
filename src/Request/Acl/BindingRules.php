<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 上午1:33
 */
namespace EasySwoole\Consul\Request\Acl;

use EasySwoole\Consul\Request\BaseCommand;

class BindingRules extends BaseCommand
{
    protected $url = 'acl/binding-rules';

    /**
     * @var string
     */
    protected $authmethod;

    /**
     * @return null|string
     */
    public function getauthmethod(): ?string
    {
        return $this->authmethod;
    }

    /**
     * @param string $authmethod
     */
    public function setauthmethod(string $authmethod): void
    {
        $this->authmethod = $authmethod;
    }
}