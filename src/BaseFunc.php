<?php
namespace EasySwoole\Consul;

use EasySwoole\HttpClient\Exception\InvalidUrl;
use EasySwoole\HttpClient\HttpClient;
use EasySwoole\Spl\SplBean;

class BaseFunc
{
    protected $config;
    protected $route;
    protected $keywords;

    /**
     * BaseFunc constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->route = $config->__toString();
        $this->keywords = ['self','clone','list'];
    }

    /**
     * @param SplBean $bean
     * @param string $action
     * @param bool $defaultRoot
     * @return bool|null
     * @throws InvalidUrl
     * @throws \ReflectionException
     */
    protected function putJSON(SplBean $bean, $action = "", $defaultRoot = true, array $useReflection = [])
    {

        if (!$useReflection['reflection']) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
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
     * @param bool $defaultRoot
     * @param array $useReflection $useRef = ['reflection' => true,'url' => 'url']
    ];
     * @return bool|null
     * @throws InvalidUrl
     * @throws \ReflectionException
     */
    protected function getJson(SplBean $bean, $action="", $defaultRoot = true, array $useReflection = [])
    {
        if (!$useReflection['reflection']) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
        }

//        if (isset($action) && !empty($action)) {
//            $url .= '/' . $action;
//        }
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
     * @param array $headers
     * @param bool $defaultRoot
     * @return bool|null
     * @throws InvalidUrl
     * @throws \ReflectionException
     */
    protected function postJson(SplBean $bean, $action="", array $headers=[], $defaultRoot = true, array $useReflection = [])
    {
        if (!$useReflection['reflection']) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
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
     * @param string $action
     * @param array $headers
     * @param bool $defaultRoot
     * @return bool|null
     * @throws InvalidUrl
     * @throws \ReflectionException
     */
    protected function deleteJson(SplBean $bean, $action="", array $headers=[], $defaultRoot = true, array $useReflection = [])
    {
        if (!$useReflection['reflection']) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
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
                $ret = $http->delete()->getBody();
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
    private function getRoute(SplBean $bean, $action = "", $defaultRoot = true)
    {
        $beanRoute = new \ReflectionClass($bean);
        if (empty($beanRoute)) {
            throw new \ReflectionException(static::class);
        }
        if ($defaultRoot) {
            $route = substr($beanRoute->name, strpos($beanRoute->name,'\\') + 1);
            $route = substr($route, strpos($route,'\\') + 1);
            $route = substr($route, strpos($route,'\\') + 1);
            $route = strtolower(str_replace('\\','/',$route));
            $this->route .= $route;
            if (isset($action) && !empty($action)) {
                $this->route .= '/' . $action;
            }
        } else {
            $lastRoute = substr($beanRoute->name, strripos($beanRoute->name,'\\') + 1);
            $route = substr($beanRoute->name, strpos($beanRoute->name,'\\') + 1);
            $route = substr($route, strpos($route,'\\') + 1);
            $route = substr($route, strpos($route,'\\') + 1);
            $route = substr($route, 0, strripos($route,'\\') + 1);
            if (isset($action) && !empty($action)) {
                $route .= $action;
            }
            $route .= '/' . $lastRoute;
            $route = strtolower(str_replace('\\','/',$route));
            $this->route .= $route;
        }
        return $this->route;
    }
}