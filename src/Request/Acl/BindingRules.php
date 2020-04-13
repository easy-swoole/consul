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
    protected $authMethod;

    /**
     * @return null|string
     */
    public function getAuthMethod(): ?string
    {
        return $this->authMethod;
    }

    /**
     * @param string $authMethod
     */
    public function setAuthMethod($authMethod): void
    {
        $this->authMethod = $authMethod;
    }

    protected function setKeyMapping(): array
    {
        return [
            'AuthMethod' => 'authMethod',
        ];
    }
}
