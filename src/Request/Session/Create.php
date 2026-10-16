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
    protected string $url = 'session/create';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var string
     */
    protected ?string $lockDelay = null;
    /**
     * @var string
     */
    protected ?string $node = null;
    /**
     * @var string
     */
    protected ?string $name = null;
    /**
     * @var array
     */
    protected ?array $checks = null;
    /**
     * @var string
     */
    protected ?string $behavior = null;
    /**
     * @var string
     */
    protected ?string $TTL = null;

    /**
     * @return string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc($dc): void
    {
        $this->dc = $dc;
    }

    /**
     * @return string
     */
    public function getLockDelay(): ?string
    {
        return $this->lockDelay;
    }

    /**
     * @param string $lockDelay
     */
    public function setLockDelay($lockDelay): void
    {
        $this->lockDelay = $lockDelay;
    }

    /**
     * @return string
     */
    public function getNode(): ?string
    {
        return $this->node;
    }

    /**
     * @param string $node
     */
    public function setNode($node): void
    {
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getChecks(): ?array
    {
        return $this->checks;
    }

    /**
     * @param array $checks
     */
    public function setChecks($checks): void
    {
        $this->checks = $checks;
    }

    /**
     * @return string
     */
    public function getBehavior(): ?string
    {
        return $this->behavior;
    }

    /**
     * @param string $behavior
     */
    public function setBehavior($behavior): void
    {
        $this->behavior = $behavior;
    }

    /**
     * @return string
     */
    public function getTTL(): ?string
    {
        return $this->TTL;
    }

    /**
     * @param string $TTL
     */
    public function setTTL($TTL): void
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
