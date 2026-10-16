<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/11
 * Time: 下午9:23
 */
namespace EasySwoole\Consul\ConsulInterface;

use EasySwoole\Consul\Request\Acl\AuthMethod;
use EasySwoole\Consul\Request\Acl\AuthMethods;
use EasySwoole\Consul\Request\Acl\BindingRule;
use EasySwoole\Consul\Request\Acl\BindingRules;
use EasySwoole\Consul\Request\Acl\Bootstrap;
use EasySwoole\Consul\Request\Acl\CloneACLToken;
use EasySwoole\Consul\Request\Acl\Create;
use EasySwoole\Consul\Request\Acl\Destroy;
use EasySwoole\Consul\Request\Acl\Info;
use EasySwoole\Consul\Request\Acl\Lists;
use EasySwoole\Consul\Request\Acl\Login;
use EasySwoole\Consul\Request\Acl\Logout;
use EasySwoole\Consul\Request\Acl\Policies;
use EasySwoole\Consul\Request\Acl\Policy;
use EasySwoole\Consul\Request\Acl\Replication;
use EasySwoole\Consul\Request\Acl\Role;
use EasySwoole\Consul\Request\Acl\Roles;
use EasySwoole\Consul\Request\Acl\Token;
use EasySwoole\Consul\Request\Acl\Tokens;
use EasySwoole\Consul\Request\Acl\Translate;
use EasySwoole\Consul\Request\Acl\Update;

interface AclInterface
{
    public function bootstrap(Bootstrap $bootstrap): mixed;

    public function replication(Replication $replication): mixed;

    public function translate(Translate $translate): mixed;

    public function login(Login $login): mixed;

    public function logout(Logout $logout): mixed;

    public function token(Token $token): mixed;

    public function readToken(Token $token): mixed;

    public function self(Token\GetSelf $getSelf): mixed;

    public function updateToken(Token $token): mixed;

    public function cloneToken(Token\CloneToken $token): mixed;

    public function delete(Token $token): mixed;

    public function tokens(Tokens $tokens): mixed;

    public function create(Create $create): mixed;

    public function update(Update $update): mixed;

    public function destroy(Destroy $destroy): mixed;

    public function info(Info $info): mixed;

    public function cloneAclToken(CloneACLToken $token): mixed;

    public function getList(Lists $lists): mixed;

    public function policy(Policy $policy): mixed;

    public function readPolicy(Policy $policy): mixed;

    public function updatePolicy(Policy $policy): mixed;

    public function deletePolicy(Policy $policy): mixed;

    public function policies(Policies $policies): mixed;

    public function role(Role $role): mixed;

    public function readRole(Role $role): mixed;

    public function readRoleByName(Role $role): mixed;

    public function updateRole(Role $role): mixed;

    public function deleteRole(Role $role): mixed;

    public function roles(Roles $roles): mixed;

    public function authMethod(AuthMethod $authMethod): mixed;

    public function readAuthMethod(AuthMethod $authMethod): mixed;

    public function updateAuthMethod(AuthMethod $authMethod): mixed;

    public function deleteAuthMethod(AuthMethod $authMethod): mixed;

    public function authMethods(AuthMethods $authMethods): mixed;

    public function bindingRule(BindingRule $bindingRule): mixed;

    public function readBindingRule(BindingRule $bindingRule): mixed;

    public function updateBindingRule(BindingRule $bindingRule): mixed;

    public function deleteBindingRule(BindingRule $bindingRule): mixed;

    public function bindingRules(BindingRules $bindingRules): mixed;
}
