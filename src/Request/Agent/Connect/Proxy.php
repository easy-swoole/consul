<?php
namespace EasySwoole\Consul\Request\Agent\Connect;

use EasySwoole\Consul\Request\BaseCommand;

class Proxy extends BaseCommand
{
    protected $url = 'agent/connect/proxy/%s';

    /**
     * @var string
     */
    protected $id;

    /**
     * @return string
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId ($id)
    {
        $this->id = $id;
    }

    protected function setKeyMapping (): array
    {
        return [
            'ID' => 'id',
        ];
    }
}