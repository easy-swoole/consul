<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午1:50
 */
namespace EasySwoole\Consul\Request\Operator;

use EasySwoole\Consul\Request\BaseCommand;

class License extends BaseCommand
{
    protected string $url = 'operator/license';

    /**
     * @var string
     */
    protected ?string $dc = null;

    /**
     * @return null|string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc(string $dc): void
    {
        $this->dc = $dc;
    }
}
