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
    public function bootstrap(Bootstrap $bootstrap);

    public function replication(Replication $replication);

    public function translate(Translate $translate);

    public function login(Login $login);

    public function logout(Logout $logout);

    public function token(Token $token);

    public function readToken(Token $token);

    public function self(Token\GetSelf $getSelf);

    public function updateToken(Token $token);

    public function cloneToken(Token\CloneToken $token);

    public function delete(Token $token);

    public function tokens(Tokens $tokens);

    public function create(Create $create);

    public function update(Update $update);

    public function destroy(Destroy $destroy);

    public function info(Info $info);

    public function cloneAclToken(CloneACLToken $token);

    public function getList(Lists $lists);

    public function policy(Policy $policy);

    public function readPolicy(Policy $policy);

    public function updatePolicy(Policy $policy);

    public function deletePolicy(Policy $policy);

    public function policies(Policies $policies);

    public function role(Role $role);

    public function readRole(Role $role);

    public function readRoleByName(Role $role);

    public function updateRole(Role $role);

    public function deleteRole(Role $role);

    public function roles(Roles $roles);

    public function authMethod(AuthMethod $authMethod);

    public function readAuthMethod(AuthMethod $authMethod);

    public function updateAuthMethod(AuthMethod $authMethod);

    public function deleteAuthMethod(AuthMethod $authMethod);

    public function authMethods(AuthMethods $authMethods);

    public function bindingRule(BindingRule $bindingRule);

    public function readBindingRule(BindingRule $bindingRule);

    public function updateBindingRule(BindingRule $bindingRule);

    public function deleteBindingRule(BindingRule $bindingRule);

    public function bindingRules(BindingRules $bindingRules);
}