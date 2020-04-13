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
    protected $url = 'connect/intentions/%s';

    /**
     * @var string
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $sourceName;
    /**
     * @var string
     */
    protected $destinationName;
    /**
     * @var string
     */
    protected $sourceType;
    /**
     * @var string
     */
    protected $action;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $meta;

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getSourceName()
    {
        return $this->sourceName;
    }

    /**
     * @param string $sourceName
     */
    public function setSourceName($sourceName)
    {
        $this->sourceName = $sourceName;
    }

    /**
     * @return string
     */
    public function getDestinationName()
    {
        return $this->destinationName;
    }

    /**
     * @param string $destinationName
     */
    public function setDestinationName($destinationName)
    {
        $this->destinationName = $destinationName;
    }

    /**
     * @return string
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * @param string $sourceType
     */
    public function setSourceType($sourceType)
    {
        $this->sourceType = $sourceType;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param string $meta
     */
    public function setMeta($meta)
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
