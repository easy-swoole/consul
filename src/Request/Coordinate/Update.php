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
    protected $url = 'coordinate/update%s';

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
    protected $coord;

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
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @param string $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
    }

    /**
     * @return array
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * @param array $node
     */
    public function setNode($node)
    {
        $this->node = $node;
    }

    /**
     * @return array
     */
    public function getCoord()
    {
        return $this->coord;
    }

    /**
     * @param array $coord
     */
    public function setCoord($coord)
    {
        $this->coord = json_encode($coord);
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
