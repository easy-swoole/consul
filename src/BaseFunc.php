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
    }

    /**
     * @param SplBean $bean
     * @return null
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    protected function putJSON(SplBean $bean)
    {
        $param = $bean->__toString();

        $url = $this->route;
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
     */
    protected function getJson(SplBean $bean)
    {
        $param = http_build_query($bean->toArray());
        $url = $this->route . '?' . $param;
        try{
            $http = new HttpClient($url);
            var_dump($url);
            var_dump($param);
            $ret = $http->get()->getBody();
//            var_dump($ret);
            if (isset($ret) && !empty($ret)) {
                $json = json_decode($ret,true);
                if ($json) {
                    if (is_array($json)) {
                        var_dump($json);
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

    public function getRoute(): string
    {
        echo __CLASS__;

    }
}