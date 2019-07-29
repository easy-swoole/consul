<?php
namespace EasySwoole\Consul;

use EasySwoole\EasySwoole\Logger;
use EasySwoole\HttpClient\HttpClient;
use EasySwoole\Spl\Exception\Exception;
use EasySwoole\Spl\SplBean;

class BaseFunc
{
    protected $config;
    protected $route;

    /**
     * BaseFunc constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->route = $config->__toString();
    }

    /**
     * @param SplBean $bean
     * @param string $action
     * @return bool|null
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    protected function putJSON(SplBean $bean, $action = "")
    {
        $url = $this->getRoute($bean);
        if (isset($action) && !empty($action)) {
            $url .= '/' . $action;
        }
        $param = $bean->__toString();

        try{
            $http = new HttpClient($url);
            var_dump($url);
            var_dump($param);
            $ret = $http->put($param)->getBody();
            var_dump($ret);
            if (isset($ret) && !empty($ret)) {
                $json = json_decode($ret,true);
                if ($json) {
                    if (is_array($json)) {
                        // 存bean。基本上config，也可能是单独方法的params
                        return true;
                    }
                    return true; // 返回字符串或者boolean
                } else{
                    return null;
                }
            } else {
                throw new Exception('Http error');
            }

        } catch (Exception $exception) {
            Logger::getInstance()->notice($exception->getMessage(),Logger::LOG_LEVEL_NOTICE);
        }
    }

    /**
     * @param SplBean $bean
     * @return bool|null
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    protected function getJson(SplBean $bean,$action="")
    {
        $url = $this->getRoute($bean);
        if (isset($action) && !empty($action)) {
            $url .= '/' . $action;
        }
        $param = http_build_query($bean->toArrayWithMapping());
        try{
            $http = new HttpClient($url);
            var_dump($url);
            var_dump($param);
            $ret = $http->get()->getBody();
            var_dump($ret);
            if (isset($ret) && !empty($ret)) {
                $json = json_decode($ret,true);
                if ($json) {
                    if (is_array($json)) {
//                        var_dump($json);
                        // 存bean。基本上config，也可能是单独方法的params
                        return true;
                    }
                    return true; // 返回字符串或者boolean
                } else{
                    return null;
                }
            } else {
                throw new Exception('Http error');
            }

        } catch (Exception $exception) {
            Logger::getInstance()->notice($exception->getMessage(),Logger::LOG_LEVEL_NOTICE);
        }
    }

    /**
     * @param SplBean $bean
     * @return string
     * @throws \ReflectionException
     */
    private function getRoute(SplBean $bean)
    {
        $beanRoute = new \ReflectionClass($bean);
        $route = substr($beanRoute->name, strpos($beanRoute->name,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = strtolower(str_replace('\\','/',$route));
        $this->route .= $route;
        return $this->route;
    }
}