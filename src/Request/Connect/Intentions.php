<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午7:27
 */
namespace EasySwoole\Consul\Request\Connect;

use EasySwoole\Spl\SplBean;

/**
 * Class Intentions
{
    "SourceName": "web",
  "DestinationName": "db",
  "SourceType": "consul",
  "Action": "allow"
}
 * @package EasySwoole\Consul\Request\Connect
 */
class Intentions extends SplBean
{
    /**
     * @var s
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $SourceName;
    /**
     * @var string
     */
    protected $DestinationName;
    /**
     * @var string
     */
    protected $SourceType;
    /**
     * @var string
     */
    protected $Action;
    /**
     * @var string
     */
    protected $Description;
    /**
     * @var string
     */
    protected $Meta;

    /**
     * @return null|string
     */
    public function getuuid (): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setuuid (string $uuid): void
    {
        $this->uuid = $uuid;
    }
    /**
     * @return null|strings
     */
    public function getSourceName(): ?string
    {
        return $this->SourceName;
    }

    /**
     * @param string $SourceName
     */
    public function setSourceName(string $SourceName): void
    {
        $this->SourceName = $SourceName;
    }

    /**
     * @return null|string
     */
    public function getDestinationName(): ?string
    {
        return $this->DestinationName;
    }

    /**
     * @param string $DestinationName
     */
    public function setDestinationName(string $DestinationName): void
    {
        $this->DestinationName = $DestinationName;
    }

    /**
     * @return null|string
     */
    public function getSourceType(): ?string
    {
        return $this->SourceType;
    }

    /**
     * @param string $SourceType
     */
    public function setSourceType(string $SourceType): void
    {
        $this->SourceType = $SourceType;
    }

    /**
     * @return null|string
     */
    public function getAction(): ?string
    {
        return $this->Action;
    }

    /**
     * @param string $Action
     */
    public function setAction(string $Action): void
    {
        $this->Action = $Action;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @return null|string
     */
    public function getMeta(): ?string
    {
        return $this->Meta;
    }

    /**
     * @param string $Meta
     */
    public function setMeta(string $Meta): void
    {
        $this->Meta = $Meta;
    }
}
