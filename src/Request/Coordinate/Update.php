<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:06
 */
namespace EasySwoole\Consul\Request\Coordinate;

use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\Spl\SplBean;

/**
 * Sample
{
    "Node": "agent-one",
  "Segment": "",
  "Coord": {
    "Adjustment": 0,
    "Error": 1.5,
    "Height": 0,
    "Vec": [0, 0, 0, 0, 0, 0, 0, 0]
  }
}
 * Class Update
 * @package EasySwoole\Consul\Request\Coordinate
 */
class Update extends BaseCommand
{
    protected string $url = 'coordinate/update%s';

    /**
     * @var string
     */
    protected ?string $dc = null;

    /**
     * @var string
     */
    protected ?string $segment = null;
    /**
     * @var array
     */
    protected ?array $node = null;
    /**
     * @var array
     */
    protected ?array $coord = null;

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
    public function getSegment(): ?string
    {
        return $this->segment;
    }

    /**
     * @param string $segment
     */
    public function setSegment($segment): void
    {
        $this->segment = $segment;
    }

    /**
     * @return array
     */
    public function getNode(): ?array
    {
        return $this->node;
    }

    /**
     * @param array $node
     */
    public function setNode($node): void
    {
        $this->node = $node;
    }

    /**
     * @return array
     */
    public function getCoord(): ?array
    {
        return $this->coord;
    }

    /**
     * @param array $coord
     */
    public function setCoord($coord): void
    {
        $this->coord = $coord;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Node' => 'node',
            'Segment' => 'segment',
            'Coord' => 'coord',
        ];
    }
}
