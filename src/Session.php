<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:47
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\SessionInterface;
use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Session\Create;
use EasySwoole\Consul\Request\Session\Destroy;
use EasySwoole\Consul\Request\Session\Info;
use EasySwoole\Consul\Request\Session\Node;
use EasySwoole\Consul\Request\Session\Renew;
use EasySwoole\Consul\Request\Session\SessionList;

class Session extends BaseFunc implements SessionInterface
{
    /**
     * Create Session
     * @param Create $create
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function create(Create $create)
    {
        return $this->putJSON($create);
    }

    /**
     * Delete Session
     * @param Destroy $destroy
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function destroy(Destroy $destroy)
    {
        if (empty($destroy->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $destroy->setUrl(sprintf($destroy->getUrl(), $destroy->getUuid()));
        $destroy->setUuid('');
        return $this->putJSON($destroy);
    }

    /**
     * Read Session
     * @param Info $info
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function info(Info $info)
    {
        if (empty($info->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $info->setUrl(sprintf($info->getUrl(), $info->getUuid()));
        $info->setUuid('');
        return $this->getJson($info);
    }

    /**
     * List Sessions for Node
     * @param Node $node
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function node(Node $node)
    {
        if (empty($node->getNode())) {
            throw new MissingRequiredParamsException('Missing the required param: node.');
        }
        $node->setUrl(sprintf($node->getUrl(), $node->getNode()));
        $node->setNode('');
        return $this->getJson($node);
    }

    /**
     * List Sessions
     * @param SessionList $sessionList
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function sessionList(SessionList $sessionList)
    {
        return $this->getJson($sessionList);
    }

    /**
     * Renew Session
     * @param Renew $renew
     * @return mixed
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function renew(Renew $renew)
    {
        if (empty($renew->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $renew->setUrl(sprintf($renew->getUrl(), $renew->getUuid()));
        $renew->setUuid('');
        return $this->putJSON($renew);
    }
}