<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 下午3:10
 */
namespace EasySwoole\Consul\Request\Operator;

use EasySwoole\Consul\Request\BaseCommand;

class Segment extends BaseCommand
{
    protected $url = 'operator/segment';

    /**
     * @var string
     */
    protected $dc;

    /**
     * @return null|string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param mixed $dc
     */
    public function setDc($dc)
    {
        $this->dc = $dc;
    }
}