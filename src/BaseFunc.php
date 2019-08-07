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
    protected function putJSON(SplBean $bean, $action = "", $defaultRoot = true, array $useReflection = [], $urlEncode = false)
    {

        if (!isset($useReflection['reflection'])) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
        }

        if ($urlEncode) {
            $url .= '?' . http_build_query($bean->toArrayWithMapping());
            $http = new HttpClient($url);
        } else {
            $param = $bean->__toString();
            $http = new HttpClient($url);
        }
        if ($http) {
            try{
                if ($urlEncode) {
                    $ret = $http->put()->getBody();
                } else {
                    $ret = $http->put($param)->getBody();
                }
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
    protected function getJson(SplBean $bean, $action="", $defaultRoot = true, array $useReflection = [], array $headers=[])
    {
        if (!isset($useReflection['reflection'])) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
        }

        $param = http_build_query($bean->toArrayWithMapping());
        $url .= '?' . $param;
        $http = new HttpClient($url);
        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->get()->getBody();
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
        if (!isset($useReflection['reflection'])) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
        }
        $param = json_encode($bean->toArrayWithMapping(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $http = new HttpClient($url);
        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->postJson($param)->getBody();
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
        if (!isset($useReflection['reflection'])) {
            $url = $this->getRoute($bean, $action, $defaultRoot);
        } else {
            $url = $useReflection['url'];
        }

        $param = json_encode($bean->toArrayWithMapping(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $http = new HttpClient($url);
        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->delete()->getBody();
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