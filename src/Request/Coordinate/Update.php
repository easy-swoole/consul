<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:06
 */
namespace EasySwoole\Consul\Request\Coordinate;

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
class Update extends SplBean
{
    /**
     * @var string
     */
    protected $Segment;
    /**
     * @var array
     */
    protected $Node;
    /**
     * @var array
     */
    protected $Coord;

    /**
     * @return null|string
     */
    public function getSegment(): ?string
    {
        return $this->Segment;
    }

    /**
     * @param string $segment
     */
    public function setSegment(string $segment): void
    {
        $this->Segment = $segment;
    }

    /**
     * @return null|string
     */
    public function getNode(): ?string
    {
        return $this->Node;
    }

    /**
     * @param string $node
     */
    public function setNode(string $node): void
    {
        $this->Node = $node;
    }

    /**
     * @return array|null
     */
    public function getCoord(): ?array
    {
        return $this->Coord;
    }

    /**
     * @param array $Coord
     */
    public function setCoord(array $Coord): void
    {
        $this->Coord = $Coord;
    }
}