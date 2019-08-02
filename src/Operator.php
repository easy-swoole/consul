<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午11:35
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Operator\Area;
use EasySwoole\Consul\Request\Operator\Autopilot\Configuration;

class Operator extends BaseFunc
{
    /**
     * Create Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function area(Area $area)
    {
        $this->postJson($area);
    }

    /**
     * List Network Areas OR List Specific Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getArea(Area $area)
    {
        $action = '';
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->getJson($area, $action);
    }

    /**
     * Update Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function updateArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->putJSON($area, $action);
    }

    /**
     * Delete Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deleteArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->deleteJson($area, $action);
    }

    /**
     * Join Network Area
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function joinArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->putJSON($area, $action,false);
    }

    /**
     * List Network Area Members
     * @param Area $area
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function membersArea(Area $area)
    {
        if (!empty($area->getUuid())) {
            $action = $area->getUuid();
            $area->setUuid('');
        }
        $this->getJson($area, $action,false);
    }

    /**
     * Read Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function getConfiguration(Configuration $configuration)
    {
        $this->getJson($configuration);
    }

    public function updateConfiguration()
    {

    }
}