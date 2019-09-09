<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午8:08
 */
namespace EasySwoole\Consul\Request\Connect\Intentions;

use EasySwoole\Consul\Request\BaseCommand;

class Match extends BaseCommand
{
    protected $url = 'connect/intentions/match';

    /**
     * @var string
     */
    protected $by;
    /**
     * @var string
     */
    protected $name;

    /**
     * @return null|string
     */
    public function getBy(): ?string
    {
        return $this->by;
    }

    /**
     * @param string $by
     */
    public function setBy(string $by): void
    {
        $this->by = $by;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}