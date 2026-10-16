<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午10:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\EventInterface;
use EasySwoole\Consul\Exception\MissingRequiredParameterException;
use EasySwoole\Consul\Request\Event\Fire;
use EasySwoole\Consul\Request\Event\ListEvent;

class Event extends AbstractEndpoint implements EventInterface
{
    /**
     * Fire Event
     * @param Fire $fire
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function fire(Fire $fire): mixed
    {
        if (empty($fire->getName())) {
            throw new MissingRequiredParameterException('Missing the required param: Name.');
        }
        $fire->setUrl(sprintf($fire->getUrl(), $fire->getName()));
        $fire->setName('');
        return $this->putJson($fire);
    }

    /**
     * List Events
     * @param ListEvent $listEvent
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function listEvent(ListEvent $listEvent): mixed
    {
        if (empty($listEvent->getName())) {
            throw new MissingRequiredParameterException('Missing the required param: Name.');
        }
        return $this->getJson($listEvent);
    }
}
