<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Event\Fire;
use EasySwoole\Consul\Request\Event\ListEvent;

class Event extends BaseFunc
{
    /**
     * Fire Event
     * @param Fire $fire
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function fire(Fire $fire)
    {
        if (empty($fire->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $fire->setUrl(sprintf($fire->getUrl(), $fire->getName()));
        $fire->setName('');
        $this->putJSON($fire);
    }

    /**
     * List Events
     * @param ListEvent $listEvent
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function listEvent(ListEvent $listEvent)
    {
        if (empty($listEvent->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        $this->getJson($listEvent);
    }
}