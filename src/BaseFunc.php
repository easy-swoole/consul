<?php
namespace EasySwoole\Consul;

use EasySwoole\HttpClient\Exception\InvalidUrl;
use EasySwoole\HttpClient\HttpClient;
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
     * @throws InvalidUrl
     * @throws \ReflectionException
     */
    protected function putJSON(SplBean $bean, $action = "")
    {
        $url = $this->getRoute($bean);
        if (isset($action) && !empty($action)) {
            $url .= '/' . $action;
        }
        $param = $bean->__toString();

        $http = new HttpClient($url);
        if ($http) {
            var_dump($url);
            var_dump($param);
            try{
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
                    } else {
                        return null;
                    }
                }
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl(static::class);
        }
    }

    /**
     * @param SplBean $bean
     * @param string $action
     * @return bool|null
     * @throws InvalidUrl
     * @throws \ReflectionException
     */
    protected function getJson(SplBean $bean,$action="")
    {
        $url = $this->getRoute($bean);
        if (isset($action) && !empty($action)) {
            $url .= '/' . $action;
        }
        $param = http_build_query($bean->toArrayWithMapping());

        $http = new HttpClient($url);
        if ($http) {
            var_dump($url);
            var_dump($param);
            try{
                $ret = $http->get()->getBody();
                var_dump($ret);
                if (isset($ret) && !empty($ret)) {
                    $json = json_decode($ret,true);
                    if ($json) {
                        if (is_array($json)) {
                            // 存bean。基本上config，也可能是单独方法的params
                            return true;
                        }
                        return true; // 返回字符串或者boolean
                    } else {
                        return null;
                    }
                }
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl('url is invalid');
        }
    }

    /**
     * @param SplBean $bean
     * @param string $action
     * @return bool|null
     * @throws InvalidUrl
     * @throws \ReflectionException
     */
    protected function postJson(SplBean $bean, $action="", array $headers=[])
    {
        $url = $this->getRoute($bean);
        if (isset($action) && !empty($action)) {
            $url .= '/' . $action;
        }
        $param = $bean->__toString();

        $http = new HttpClient($url);
        if ($http) {
            var_dump($url);
            var_dump($param);
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->postJson($param)->getBody();
                var_dump($ret);
                if (isset($ret) && !empty($ret)) {
                    $json = json_decode($ret,true);
                    if ($json) {
                        if (is_array($json)) {
                            // 存bean。基本上config，也可能是单独方法的params
                            return true;
                        }
                        return true; // 返回字符串或者boolean
                    } else {
                        return null;
                    }
                }
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl('url is invalid');
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
        if (empty($beanRoute)) {
            throw new \ReflectionException(static::class);
        }
        $route = substr($beanRoute->name, strpos($beanRoute->name,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = substr($route, strpos($route,'\\') + 1);
        $route = strtolower(str_replace('\\','/',$route));
        $this->route .= $route;
        return $this->route;
    }
}