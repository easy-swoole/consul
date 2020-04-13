<?php
namespace EasySwoole\Consul\Test;

use EasySwoole\Consul\Config;
use EasySwoole\Consul\Consul;
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
use PHPUnit\Framework\TestCase;

class AclTest extends TestCase
{
    protected $config;
    protected $consul;
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->config = new Config();
        $this->consul = new Consul($this->config);
        parent::__construct($name, $data, $dataName);
    }

    public function testBootstrap()
    {
        $bootstrap = new Bootstrap();
        $this->consul->acl()->bootstrap($bootstrap);
        $this->assertEquals('x', 'x');
    }

    public function testReplication()
    {
        $replication = new Replication();
        $this->consul->acl()->replication($replication);
        $this->assertEquals('x', 'x');
    }

    public function testTranslate()
    {
        $translate = new Translate([
            'accessor_id' => '4f48f7e6-9359-4890-8e67-6144a962b0a5'
        ]);
        $this->consul->acl()->translate($translate);
        $this->assertEquals('x', 'x');
    }

    public function testLogin()
    {
        $login = new Login([
            "authMethod" => "minikube",
            "bearerToken" => "eyJhbGciOiJSUzI1NiIsImtpZCI6IiJ9..."
        ]);
        $this->consul->acl()->login($login);
        $this->assertEquals('x', 'x');
    }

    public function testLogout()
    {
        $logout = new Logout([
            'token' => 'b78d37c7-0ca7-5f4d-99ee-6d9975ce4586'
        ]);
        $this->consul->acl()->logout($logout);
        $this->assertEquals('x', 'x');
    }

    public function testToken()
    {
        $token = new Token([
            "description" => "Agent token for 'node1'",
            "Policies" => [
                ["ID" => "165d4317-e379-f732-ce70-86278c4558f7"],
                ["Name" => "node-read"],
            ],
            "Local" => false,
        ]);
        $this->consul->acl()->token($token);
        $this->assertEquals('x', 'x');
    }

    public function testReadToken()
    {
        $token = new Token([
            "AccessorID" => "6a1253d2-1785-24fd-91c2-f8e78c745511"
        ]);
        $this->consul->acl()->readToken($token);
        $this->assertEquals('x', 'x');
    }

    public function testSelf()
    {
        $self = new Token\GetSelf([
            'token' => "6a1253d2-1785-24fd-91c2-f8e78c745511"
        ]);
        $this->consul->acl()->self($self);
        $this->assertEquals('x', 'x');
    }

    public function testUpdate()
    {
        $update = new Token([
            'accessorID' => '6a1253d2-1785-24fd-91c2-f8e78c745511',
            "Description" => "Agent token for 'node1'",
            "Policies" => [],
            "local" => false
        ]);
        $this->consul->acl()->updateToken($update);
        $this->assertEquals('x', 'x');
    }

    public function testClone()
    {
        $clone = new Token\CloneToken([
            'accessorID' => '8f246b77-f3e1-ff88-5b48-8ec93abf3e05',
            "description" => "Clone of Agent token for 'node1'",
        ]);
        $this->consul->acl()->cloneToken($clone);
        $this->assertEquals('x', 'x');
    }

    public function testDelete()
    {
        $delete = new Token([
            'AccessorID' => '8f246b77-f3e1-ff88-5b48-8ec93abf3e05'
        ]);
        $this->consul->acl()->delete($delete);
        $this->assertEquals('x', 'x');
    }

    public function testTokens()
    {
        $token = new Tokens();
        $this->consul->acl()->tokens($token);
        $this->assertEquals('x', 'x');
    }


    public function testCreateToken()
    {
        $create = new Create([
            "Name" => "my-app-token",
            "Type" => "client",
            "rules" => "a"
        ]);
        $this->consul->acl()->create($create);
        $this->assertEquals('x', 'x');
    }

    public function testUpdateToken()
    {
        $update = new Update([
            "id" => "adf4238a-882b-9ddc-4a9d-5b6758e4159e",
            "Name" => "my-app-token-updated",
            "Type" => "client",
            "Rules" => "# New Rules",
        ]);
        $this->consul->acl()->update($update);
        $this->assertEquals('x', 'x');
    }

    public function testDeleteToken()
    {
        $delete = new Destroy([
            'uuid' => '8f246b77-f3e1-ff88-5b48-8ec93abf3e05'
        ]);
        $this->consul->acl()->destroy($delete);
        $this->assertEquals('x', 'x');
    }

    public function testInfo()
    {
        $info = new Info([
            'uuid' => '8f246b77-f3e1-ff88-5b48-8ec93abf3e05'
        ]);
        $this->consul->acl()->info($info);
        $this->assertEquals('x', 'x');
    }

    public function testCloneAclToken()
    {
        $cloneAclToken = new CloneACLToken([
            'uuid' => '8f246b77-f3e1-ff88-5b48-8ec93abf3e05'
        ]);
        $this->consul->acl()->cloneAclToken($cloneAclToken);
        $this->assertEquals('x', 'x');
    }

    public function testGetList()
    {
        $getList = new Lists();
        $this->consul->acl()->getList($getList);
        $this->assertEquals('x', 'x');
    }

    public function testPolicy()
    {
        $policy = new Policy([
            "Name" => "node-read",
            "Description" => "Grants read access to all node information",
            "Rules" => "node_prefix \"\" { policy = \"read\"}",
            "datacenters" => ["dc1"]
        ]);
        $this->consul->acl()->policy($policy);
        $this->assertEquals('x', 'x');
    }

    public function testReadPolicy()
    {
        $policy = new Policy([
            'id' => 'c01a1f82-44be-41b0-a686-685fb6e0f485',
        ]);
        $this->consul->acl()->readPolicy($policy);
        $this->assertEquals('x', 'x');
    }

    public function testUpdatePolicy()
    {
        $policy = new Policy([
            "ID" => "c01a1f82-44be-41b0-a686-685fb6e0f485",
            "Name" => "register-app-service",
            "Description" => "Grants write permissions necessary to register the 'app' service",
            "Rules" => "service \"app\" { policy = \"write\"}",
        ]);
        $this->consul->acl()->updatePolicy($policy);
        $this->assertEquals('x', 'x');
    }

    public function testDeletePolicy()
    {
        $policy = new Policy([
            'id' => 'c01a1f82-44be-41b0-a686-685fb6e0f485'
        ]);
        $this->consul->acl()->deletePolicy($policy);
        $this->assertEquals('x', 'x');
    }

    public function testPolicies()
    {
        $policies = new Policies();
        $this->consul->acl()->policies($policies);
        $this->assertEquals('x', 'x');
    }

    public function testRole()
    {
        $role = new Role([
            "name" => "example-role",
            "description" => "Showcases all input parameters",
        ]);
        $this->consul->acl()->role($role);
        $this->assertEquals('x', 'x');
    }

    public function testReadRole()
    {
        $role = new Role([
            'id' => 'aa770e5b-8b0b-7fcf-e5a1-8535fcc388b4'
        ]);
        $this->consul->acl()->readRole($role);
        $this->assertEquals('x', 'x');
    }

    public function testReadRoleName()
    {
        $name = new Role([
            'name' => 'example-role'
        ]);
        $this->consul->acl()->readRoleByName($name);
        $this->assertEquals('x', 'x');
    }

    public function testUpdateRole()
    {
        $role = new Role([
            'id' => 'aa770e5b-8b0b-7fcf-e5a1-8535fcc388b4',
            "name" => "example-two",
        ]);
        $this->consul->acl()->updateRole($role);
        $this->assertEquals('x', 'x');
    }

    public function testDeleteRole()
    {
        $role = new Role([
            'id' => 'aa770e5b-8b0b-7fcf-e5a1-8535fcc388b4'
        ]);
        $this->consul->acl()->deleteRole($role);
        $this->assertEquals('x', 'x');
    }

    public function testRoles()
    {
        $roles = new Roles();
        $this->consul->acl()->roles($roles);
        $this->assertEquals('x', 'x');
    }

    public function testMethod()
    {
        $method = new AuthMethod([
            "Name" => "minikube",
            "Type" => "kubernetes",
            "Description" => "dev minikube cluster",
            "Config" => [
                "Host" => "https://192.0.2.42:8443",
                "CACert" => "-----BEGIN CERTIFICATE-----\n...-----END CERTIFICATE-----\n",
                "ServiceAccountJWT" => "eyJhbGciOiJSUzI1NiIsImtpZCI6IiJ9..."
            ]
        ]);
        $this->consul->acl()->authMethod($method);
        $this->assertEquals('x', 'x');
    }

    public function testReadAuthMethod()
    {
        $method = new AuthMethod([
            'name' => 'minikube',
        ]);
        $this->consul->acl()->readAuthMethod($method);
        $this->assertEquals('x', 'x');
    }

    public function testUpdateAuthMethod()
    {
        $method = new AuthMethod([
            "Name" => "minikube",
            "Type" => "kubernetes",
            "Description" => "dev minikube cluster",
            "Config" => [
                "Host" => "https://192.0.2.42:8443",
                "CACert" => "-----BEGIN CERTIFICATE-----\n...-----END CERTIFICATE-----\n",
                "ServiceAccountJWT" => "eyJhbGciOiJSUzI1NiIsImtpZCI6IiJ9..."
            ]
        ]);
        $this->consul->acl()->updateAuthMethod($method);
        $this->assertEquals('x', 'x');
    }

    public function testDeleteAuthMethod()
    {
        $method = new AuthMethod([
            "Name" => "minikube",
        ]);
        $this->consul->acl()->deleteAuthMethod($method);
        $this->assertEquals('x', 'x');
    }

    public function testAuthMethods()
    {
        $method = new AuthMethods();
        $this->consul->acl()->authMethods($method);
        $this->assertEquals('x', 'x');
    }

    public function testBindingRule()
    {
        $bindingRule = new BindingRule([
            "description" => "example rule",
            "authMethod" => "minikube",
            "Selector" => "serviceaccount.namespace==default",
            "BindType" => "service",
            "BindName" => "{{ serviceaccount.name }}"
        ]);
        $this->consul->acl()->bindingRule($bindingRule);
        $this->assertEquals('x', 'x');
    }

    public function testReadBindingRule()
    {
        $bindingRule = new BindingRule([
            'id' => '000ed53c-e2d3-e7e6-31a5-c19bc3518a3d',
        ]);
        $this->consul->acl()->readBindingRule($bindingRule);
        $this->assertEquals('x', 'x');
    }

    public function testUpdateBindingRule()
    {
        $bindingRule = new BindingRule([
            'id' => '000ed53c-e2d3-e7e6-31a5-c19bc3518a3d',
            "Description" => "updated rule",
            "authMethod" => "minikube",
            "Selector" => "serviceaccount.namespace=dev",
            "BindType" => "role",
            "BindName" => "{{ serviceaccount.name }}",
        ]);
        $this->consul->acl()->updateBindingRule($bindingRule);
        $this->assertEquals('x', 'x');
    }

    public function testDeleteBindingRule()
    {
        $bindingRule = new BindingRule([
            'id' => '000ed53c-e2d3-e7e6-31a5-c19bc3518a3d',
        ]);
        $this->consul->acl()->deleteBindingRule($bindingRule);
        $this->assertEquals('x', 'x');
    }

    public function testBindingRules()
    {
        $bindingRules = new BindingRules();
        $this->consul->acl()->bindingRules($bindingRules);
        $this->assertEquals('x', 'x');
    }
}
