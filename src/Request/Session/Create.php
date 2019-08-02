<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:40
 */
namespace EasySwoole\Consul\Request\Session;

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
class Create extends SplBean
{
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var string
     */
    protected $LockDelay;
    /**
     * @var string
     */
    protected $Node;
    /**
     * @var string
     */
    protected $Name;
    /**
     * @var array
     */
    protected $Checks;
    /**
     * @var string
     */
    protected $Behavior;
    /**
     * @var string
     */
    protected $TTL;

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

    /**
     * @return null|string
     */
    public function getLockDelay(): ?string
    {
        return $this->LockDelay;
    }

    /**
     * @param string $LockDelay
     */
    public function setLockDelay(string $LockDelay): void
    {
        $this->LockDelay = $LockDelay;
    }

    /**
     * @return null|string
     */
    public function getNode(): ?string
    {
        return $this->Node;
    }

    /**
     * @param string $Node
     */
    public function setNode(string $Node): void
    {
        $this->Node = $Node;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string 
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void 
    {
        $this->Name = $Name;
    }

    /**
     * @return array|null
     */
    public function getChecks(): ?array 
    {
        return $this->Checks;
    }

    /**
     * @param array $Checks
     */
    public function setChecks(array $Checks): void
    {
        $this->Checks = $Checks;
    }

    /**
     * @return null|string
     */
    public function getBehavior(): ?string
    {
        return $this->Behavior;
    }

    /**
     * @param string $Behavior
     */
    public function setBehavior(string $Behavior): void
    {
        $this->Behavior = $Behavior;
    }

    /**
     * @return null|string
     */
    public function getTTL(): ?string
    {
        return $this->TTL;
    }

    /**
     * @param string $TTL
     */
    public function setTTL (string $TTL ): void
    {
        $this->TTL = $TTL;
    }
}