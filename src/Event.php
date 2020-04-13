<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\EventInterface;
use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Event\Fire;
use EasySwoole\Consul\Request\Event\ListEvent;

class Event extends BaseFunc implements EventInterface
{
    /**
     * Fire Event
     * @param Fire $fire
     * @return mixed
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
        return $this->putJSON($fire);
    }

    /**
     * List Events
     * @param ListEvent $listEvent
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function listEvent(ListEvent $listEvent)
    {
        if (empty($listEvent->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: Name.');
        }
        return $this->getJson($listEvent);
    }
}
