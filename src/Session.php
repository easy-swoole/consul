<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午9:47
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Session\Create;
use EasySwoole\Consul\Request\Session\Destroy;
use EasySwoole\Consul\Request\Session\Info;
use EasySwoole\Consul\Request\Session\Node;
use EasySwoole\Consul\Request\Session\Renew;
use EasySwoole\Consul\Request\Session\SessionList;

class Session extends BaseFunc
{
    /**
     * Create Session
     * @param Create $create
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function create(Create $create)
    {
        $this->putJSON($create);
    }

    /**
     * Delete Session
     * @param Destroy $destroy
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function destroy(Destroy $destroy)
    {
        $action = '';
        if (!empty($destroy->getUuid())) {
            $action = $destroy->getUuid();
            $destroy->setUuid('');
        }
        $this->putJSON($destroy, $action);
    }

    /**
     * Read Session
     * @param Info $info
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function info(Info $info)
    {
        $action = '';
        if (!empty($info->getUuid())) {
            $action = $info->getUuid();
            $info->setUuid('');
        }
        $this->getJson($info, $action);
    }

    /**
     * List Sessions for Node
     * @param Node $node
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function node(Node $node)
    {
        $action = '';
        if (!empty($node->getNode())) {
            $action = $node->getNode();
            $node->setNode('');
        }
        $this->getJson($node, $action);
    }

    /**
     * List Sessions
     * @param SessionList $sessionList
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function sessionList(SessionList $sessionList)
    {
        $beanRoute = new \ReflectionClass($sessionList);
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
        $this->getJson($sessionList,'',true, $useRef);
    }

    /**
     * Renew Session
     * @param Renew $renew
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function renew(Renew $renew)
    {
        $action = '';
        if (!empty($renew->getUuid())) {
            $action = $renew->getUuid();
            $renew->setUuid('');
        }
        $this->putJSON($renew, $action);
    }
}