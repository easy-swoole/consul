<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 上午12:55
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\AclInterface;
use EasySwoole\Consul\Exception\MissingRequiredParamsException;
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
use EasySwoole\Consul\Request\Acl\Token\GetSelf;
use EasySwoole\Consul\Request\Acl\Token\CloneToken;
use EasySwoole\Consul\Request\Acl\Tokens;
use EasySwoole\Consul\Request\Acl\Translate;
use EasySwoole\Consul\Request\Acl\Update;

class Acl extends BaseFunc implements AclInterface
{
    /**
     * Bootstrap ACLs
     * @param Bootstrap $bootstrap
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function bootstrap(Bootstrap $bootstrap)
    {
        return $this->putJSON($bootstrap);
    }

    /**
     * Check ACL Replication
     * @param Replication $replication
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function replication(Replication $replication)
    {
        return $this->getJson($replication);
    }

    /**
     * Translate Rules
     * @param Translate $translate
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function translate(Translate $translate)
    {
        if ($translate->getAccessorId()) {
            $translate->setUrl(sprintf($translate->getUrl(), $translate->getAccessorId()));
            $translate->setAccessorId('');
            return $this->getJson($translate);
        } else {
            $translate->setUrl(substr($translate->getUrl(), 0, strlen($translate->getUrl()) -3));
            return $this->postJson($translate);
        }
    }

    /**
     * Login to Auth Method
     * @param Login $login
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function login(Login $login)
    {
        if (empty($login->getAuthMethod())) {
            throw new MissingRequiredParamsException('Missing the required param: AuthMethod.');
        }
        if (empty($login->getBearerToken())) {
            throw new MissingRequiredParamsException('Missing the required param: BearerToken.');
        }
        return $this->postJson($login);
    }

    /**
     * Logout from Auth Method
     * @param Logout $logout
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function logout(Logout $logout)
    {
        $header = array(
            'X-Consul-Token' => $logout->getToken(),
        );
        $logout->setToken('');
        return $this->postJson($logout, $header);
    }

    /**
     * Create a Token  OR Read a Token OR Update a Token
     * @param Token $token
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function token(Token $token)
    {
        $token->setUrl(substr($token->getUrl(), 0, strlen($token->getUrl()) -3));
        return $this->putJSON($token);
    }

    /**
     * Read a Token
     * @param Token $token
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readToken(Token $token)
    {
        if (empty($token->getAccessorID())) {
            throw new MissingRequiredParamsException('Missing the required param: AccessorID.');
        }
        $token->setUrl(sprintf($token->getUrl(), $token->getAccessorId()));
        $token->setAccessorId('');
        return $this->getJson($token);
    }

    /**
     * Read Self Token
     * @param GetSelf $getSelf
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function self(GetSelf $getSelf)
    {
        $header = array(
            'X-Consul-Token' => $getSelf->getToken(),
        );
        $getSelf->setToken('');
        return $this->getJson($getSelf, $header);
    }

    /**
     * Update a Token
     * @param Token $token
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateToken(Token $token)
    {
        if (empty($token->getAccessorID())) {
            throw new MissingRequiredParamsException('Missing the required param: AccessorID.');
        }
        $token->setUrl(sprintf($token->getUrl(), $token->getAccessorId()));
        $token->setAccessorId('');
        return $this->putJSON($token);
    }

    /**
     * Clone a Token
     * @param CloneToken $cloneToken
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function cloneToken(CloneToken $cloneToken)
    {
        if (empty($cloneToken->getAccessorID())) {
            throw new MissingRequiredParamsException('Missing the required param: AccessorID.');
        }
        $cloneToken->setUrl(sprintf($cloneToken->getUrl(), $cloneToken->getAccessorId()));
        $cloneToken->setAccessorId('');
        return $this->putJSON($cloneToken);
    }

    /**
     * Delete a Token
     * @param Token $token
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function delete(Token $token)
    {
        if (empty($token->getAccessorID())) {
            throw new MissingRequiredParamsException('Missing the required param: AccessorID.');
        }
        $token->setUrl(sprintf($token->getUrl(), $token->getAccessorId()));
        $token->setAccessorId('');
        return $this->deleteJson($token);
    }

    /**
     * List Tokens
     * @param Tokens $tokens
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function tokens(Tokens $tokens)
    {
        return $this->getJson($tokens);
    }

    /**
     * Create ACL Token
     * @param Create $create
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function create(Create $create)
    {
        return $this->putJSON($create);
    }

    /**
     * Update ACL Token
     * @param Update $update
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function update(Update $update)
    {
        if (empty($update->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: ID.');
        }
        return $this->putJSON($update);
    }

    /**
     * Delete ACL Token
     * @param Destroy $destroy
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function destroy(Destroy $destroy)
    {
        if (empty($destroy->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $destroy->setUrl(sprintf($destroy->getUrl(), $destroy->getUuid()));
        $destroy->setUuid('');
        return $this->putJSON($destroy);
    }

    /**
     * Read ACL Token
     * @param Info $info
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function info(Info $info)
    {
        if (empty($info->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $info->setUrl(sprintf($info->getUrl(), $info->getUuid()));
        $info->setUuid('');
        return $this->getJson($info);
    }

    /**
     * Clone ACL Token
     * @param CloneACLToken $cloneACLToken
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function cloneAclToken(CloneACLToken $cloneACLToken)
    {
        if (empty($cloneACLToken->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $cloneACLToken->setUrl(sprintf($cloneACLToken->getUrl(), $cloneACLToken->getUuid()));
        $cloneACLToken->setUuid('');
        return $this->putJSON($cloneACLToken);
    }

    /**
     * List ACLs
     * @param Lists $lists
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function getList(Lists $lists)
    {
        return $this->getJson($lists);
    }

    /**
     * Create a Policy
     * @param Policy $policy
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function policy(Policy $policy)
    {
        if (empty($policy->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $policy->setUrl(substr($policy->getUrl(), 0, strlen($policy->getUrl()) -3));
        return $this->putJSON($policy);
    }

    /**
     * Read a Policy
     * @param Policy $policy
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readPolicy(Policy $policy)
    {
        if (empty($policy->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: id.');
        }
        $policy->setUrl(sprintf($policy->getUrl(), $policy->getId()));
        $policy->setId('');
        return $this->getJson($policy);
    }

    /**
     * Update a Policy
     * @param Policy $policy
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updatePolicy(Policy $policy)
    {
        if (empty($policy->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: id.');
        }
        if (empty($policy->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $policy->setUrl(substr($policy->getUrl(), 0, strlen($policy->getUrl()) -3));
        return $this->putJSON($policy);
    }


    /**
     * Delete a Policy
     * @param Policy $policy
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deletePolicy(Policy $policy)
    {
        if (empty($policy->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: id.');
        }
        $policy->setUrl(sprintf($policy->getUrl(), $policy->getId()));
        $policy->setId('');
        return $this->deleteJson($policy);
    }

    /**
     * List Policies
     * @param Policies $policies
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function policies(Policies $policies)
    {
        return $this->getJson($policies);
    }

    /**
     * Create a Role
     * @param Role $role
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function role(Role $role)
    {
        if (empty($role->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $role->setUrl(substr($role->getUrl(), 0, strlen($role->getUrl()) -3));
        return $this->putJSON($role);
    }

    /**
     * Read a Role
     * @param Role $role
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readRole(Role $role)
    {
        if (empty($role->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: id.');
        }
        $role->setUrl(sprintf($role->getUrl(), $role->getId()));
        $role->setId('');
        return $this->getJson($role);
    }

    /**
     * Read a Role by Name
     * @param Role $role
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readRoleByName(Role $role)
    {
        if (empty($role->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $role->setUrl(sprintf($role->getUrl(), 'name/' . $role->getName()));
        $role->setName('');
        return $this->getJson($role);
    }

    /**
     * Update a Role
     * @param Role $role
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateRole(Role $role)
    {
        if (empty($role->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: id.');
        }
        if (empty($role->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $role->setUrl(sprintf($role->getUrl(), $role->getId()));
        return $this->putJSON($role);
    }

    /**
     * Delete a Role
     * @param Role $role
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteRole(Role $role)
    {
        if (empty($role->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: id.');
        }
        $role->setUrl(sprintf($role->getUrl(), $role->getId()));
        $role->setId('');
        return $this->deleteJson($role);
    }

    /**
     * List Roles
     * @param Roles $roles
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function roles(Roles $roles)
    {
        return $this->getJson($roles);
    }

    /**
     * Create an Auth Method
     * @param AuthMethod $authMethod
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function authMethod(AuthMethod $authMethod)
    {
        if (empty($authMethod->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        if (empty($authMethod->getType())) {
            throw new MissingRequiredParamsException('Missing the required param: Type.');
        }
        $authMethod->setUrl(substr($authMethod->getUrl(), 0, strlen($authMethod->getUrl()) -3));
        return $this->putJSON($authMethod);
    }

    /**
     * Read an Auth Method
     * @param AuthMethod $authMethod
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readAuthMethod(AuthMethod $authMethod)
    {
        if (empty($authMethod->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $authMethod->setUrl(sprintf($authMethod->getUrl(), $authMethod->getName()));
        $authMethod->setName('');
        return $this->getJson($authMethod);
    }

    /**
     * Update an Auth Method
     * @param AuthMethod $authMethod
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateAuthMethod(AuthMethod $authMethod)
    {
        if (empty($authMethod->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        if (empty($authMethod->getType())) {
            throw new MissingRequiredParamsException('Missing the required param: Type.');
        }
        $authMethod->setUrl(sprintf($authMethod->getUrl(), $authMethod->getName()));
        return $this->putJSON($authMethod);
    }

    /**
     * Delete an Auth Method
     * @param AuthMethod $authMethod
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteAuthMethod(AuthMethod $authMethod)
    {
        if (empty($authMethod->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $authMethod->setUrl(sprintf($authMethod->getUrl(), $authMethod->getName()));
        $authMethod->setName('');
        return $this->deleteJson($authMethod);
    }

    /**
     * List Auth Methods
     * @param AuthMethods $authMethods
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function authMethods(AuthMethods $authMethods)
    {
        return $this->getJson($authMethods);
    }

    /**
     * Create a Binding Rule
     * @param BindingRule $bindingRule
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function bindingRule(BindingRule $bindingRule)
    {
        if (empty($bindingRule->getAuthMethod())) {
            throw new MissingRequiredParamsException('Missing the required param: AuthMethod.');
        }
        if (empty($bindingRule->getBindType())) {
            throw new MissingRequiredParamsException('Missing the required param: BindType.');
        }
        if (empty($bindingRule->getBindName())) {
            throw new MissingRequiredParamsException('Missing the required param: BindName.');
        }
        $bindingRule->setUrl(substr($bindingRule->getUrl(), 0, strlen($bindingRule->getUrl()) -3));

        return $this->putJSON($bindingRule);
    }

    /**
     * Read a Binding Rule
     * @param BindingRule $bindingRule
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readBindingRule(BindingRule $bindingRule)
    {
        if (empty($bindingRule->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: ID.');
        }
        $bindingRule->setUrl(sprintf($bindingRule->getUrl(), $bindingRule->getId()));
        $bindingRule->setId('');
        return $this->getJson($bindingRule);
    }

    /**
     * Update a Binding Rule
     * @param BindingRule $bindingRule
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateBindingRule(BindingRule $bindingRule)
    {
        if (empty($bindingRule->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: ID.');
        }
        if (empty($bindingRule->getAuthMethod())) {
            throw new MissingRequiredParamsException('Missing the required param: AuthMethod.');
        }
        if (empty($bindingRule->getBindType())) {
            throw new MissingRequiredParamsException('Missing the required param: BindType.');
        }
        if (empty($bindingRule->getBindName())) {
            throw new MissingRequiredParamsException('Missing the required param: BindName.');
        }
        $bindingRule->setUrl(sprintf($bindingRule->getUrl(), $bindingRule->getId()));
        $bindingRule->setId('');
        return $this->putJSON($bindingRule);
    }

    /**
     * Delete a Binding Rule
     * @param BindingRule $bindingRule
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteBindingRule(BindingRule $bindingRule)
    {
        if (empty($bindingRule->getId())) {
            throw new MissingRequiredParamsException('Missing the required param: ID.');
        }
        $bindingRule->setUrl(sprintf($bindingRule->getUrl(), $bindingRule->getId()));
        $bindingRule->setId('');
        return $this->deleteJson($bindingRule);
    }

    /**
     * List Binding Rules
     * @param BindingRules $bindingRules
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function bindingRules(BindingRules $bindingRules)
    {
        return $this->getJson($bindingRules);
    }
}
