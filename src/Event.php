<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Event\Fire;
use EasySwoole\Consul\Request\Event\ListEvent;

class Event extends BaseFunc
{
    /**
     * Fire Event
     * @param Fire $fire
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function fire(Fire $fire)
    {
        $action = '';
        if (!empty($fire->getName())) {
            $action = $fire->getName();
            $fire->setName('');
        }
        $this->putJSON($fire, $action);
    }

    /**
     * List Events
     * @param ListEvent $listEvent
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function listEvent(ListEvent $listEvent)
    {
        $beanRoute = new \ReflectionClass($listEvent);
        if (empty($beanRoute)) {
            throw new \ReflectionException(static::class);
        }
        $route = substr($beanRoute->name, strpos($beanRoute->name,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = substr($route, 0, strripos($route,'\\') + 1);
        $route .= 'list';
        $route = strtolower(str_replace('\\','/',$route));
        $useRef = [
            'reflection' => true,
            'url' => $this->route.$route,
        ];
        $this->getJson($listEvent, '',true,$useRef);
    }
}