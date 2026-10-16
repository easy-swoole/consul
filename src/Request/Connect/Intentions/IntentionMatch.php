<?php
namespace EasySwoole\Consul\Request\Connect\Intentions;

use EasySwoole\Consul\Request\BaseCommand;

class IntentionMatch extends BaseCommand
{
    protected string $url = 'connect/intentions/match';
    protected ?string $by = null;
    protected ?string $name = null;

    public function getBy(): ?string
    {
        return $this->by;
    }

    public function setBy(string $by): void
    {
        $this->by = $by;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
