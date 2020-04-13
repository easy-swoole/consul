<?php
namespace EasySwoole\Consul\Request\Agent;

use EasySwoole\Consul\Request\BaseCommand;

class Token extends BaseCommand
{
    protected $url = 'agent/token/%s';

    /**
     * Token format is 'adf4238a-882b-9ddc-4a9d-5b6758e4159e'
     * @var string
     */
    protected $token;
    /**
     * action is one of the [default,agent,agent_master,replication,acl_token,acl_agent_token,acl_agent_master_token,acl_replication_token]
     * @var string
     */
    protected $action;
    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    protected function setKeyMapping(): array
    {
        return ['Token' => 'token'];
    }
}
