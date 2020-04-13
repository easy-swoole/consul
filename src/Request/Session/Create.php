<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:40
 */
namespace EasySwoole\Consul\Request\Session;

use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\Spl\SplBean;

/**
 * Sample
{
    "LockDelay": "15s",
  "Name": "my-service-lock",
  "Node": "foobar",
  "Checks": ["a", "b", "c"],
  "Behavior": "release",
  "TTL": "30s"
}

 * Class Create
 * @package EasySwoole\Consul\Request\Session
 */
class Create extends BaseCommand
{
    protected $url = 'session/create';

    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $lockDelay;
    /**
     * @var string
     */
    protected $node;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var array
     */
    protected $checks;
    /**
     * @var string
     */
    protected $behavior;
    /**
     * @var string
     */
    protected $TTL;

    /**
     * @return string
     */
    public function getDc()
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc($dc)
    {
        $this->dc = $dc;
    }

    /**
     * @return string
     */
    public function getLockDelay()
    {
        return $this->lockDelay;
    }

    /**
     * @param string $lockDelay
     */
    public function setLockDelay($lockDelay)
    {
        $this->lockDelay = $lockDelay;
    }

    /**
     * @return string
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * @param string $node
     */
    public function setNode($node)
    {
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getChecks()
    {
        return $this->checks;
    }

    /**
     * @param array $checks
     */
    public function setChecks($checks)
    {
        $this->checks = $checks;
    }

    /**
     * @return string
     */
    public function getBehavior()
    {
        return $this->behavior;
    }

    /**
     * @param string $behavior
     */
    public function setBehavior($behavior)
    {
        $this->behavior = $behavior;
    }

    /**
     * @return string
     */
    public function getTTL()
    {
        return $this->TTL;
    }

    /**
     * @param string $TTL
     */
    public function setTTL($TTL)
    {
        $this->TTL = $TTL;
    }

    protected function setKeyMapping(): array
    {
        return [
            'LockDelay' => 'LockDelay',
            'Node' => 'node',
            'Name' => 'name',
            'Checks' => 'checks',
            'Behavior' => 'behavior',
        ];
    }
}
