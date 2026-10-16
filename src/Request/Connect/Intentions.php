<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午7:27
 */
namespace EasySwoole\Consul\Request\Connect;

use EasySwoole\Consul\Request\BaseCommand;
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
class Intentions extends BaseCommand
{
    protected string $url = 'connect/intentions/%s';

    /**
     * @var string
     */
    protected ?string $uuid = null;
    /**
     * @var string
     */
    protected ?string $sourceName = null;
    /**
     * @var string
     */
    protected ?string $destinationName = null;
    /**
     * @var string
     */
    protected ?string $sourceType = null;
    /**
     * @var string
     */
    protected ?string $action = null;
    /**
     * @var string
     */
    protected ?string $description = null;
    /**
     * @var string
     */
    protected ?string $meta = null;

    /**
     * @return string
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getSourceName(): ?string
    {
        return $this->sourceName;
    }

    /**
     * @param string $sourceName
     */
    public function setSourceName($sourceName): void
    {
        $this->sourceName = $sourceName;
    }

    /**
     * @return string
     */
    public function getDestinationName(): ?string
    {
        return $this->destinationName;
    }

    /**
     * @param string $destinationName
     */
    public function setDestinationName($destinationName): void
    {
        $this->destinationName = $destinationName;
    }

    /**
     * @return string
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * @param string $sourceType
     */
    public function setSourceType($sourceType): void
    {
        $this->sourceType = $sourceType;
    }

    /**
     * @return string
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getMeta(): ?string
    {
        return $this->meta;
    }

    /**
     * @param string $meta
     */
    public function setMeta($meta): void
    {
        $this->meta = $meta;
    }

    protected function setKeyMapping(): array
    {
        return [
            'SourceName' => 'sourceName',
            'DestinationName' => 'destinationName',
            'SourceType' => 'sourceType',
            'Action' => 'action',
            'Description' => 'description',
            'Meta' => 'meta',
        ];
    }
}
