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
    protected $dc;
    /**
     * @var string
     */
    protected $segment;
    /**
     * @var array
     */
    protected $node;
    /**
     * @var array
     */
    protected $Coord;
    /**
     * @return null|strings
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
    public function getSegment(): ?string
    {
        return $this->segment;
    }

    /**
     * @param string $segment
     */
    public function setSegment(string $segment): void
    {
        $this->segment = $segment;
    }

    /**
     * @return null|string
     */
    public function getNode(): ?string
    {
        return $this->node;
    }

    /**
     * @param string $node
     */
    public function setNode(string $node): void
    {
        $this->node = $node;
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