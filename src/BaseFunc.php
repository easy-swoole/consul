<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\HttpClient\Exception\InvalidUrl;
use EasySwoole\HttpClient\HttpClient;
use EasySwoole\Spl\Exception\Exception;
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
     * @param BaseCommand $bean
     * @return mixed|null
     * @throws InvalidUrl
     */
    protected function putJSON(BaseCommand $bean)
    {
//        if (!isset($useReflection['reflection'])) {
//            $url = $this->getRoute($bean, $action, $defaultRoot);
//        } else {
//            $url = $useReflection['url'];
//        }
//
//        if ($urlEncode) {
//            $url .= '?' . http_build_query($bean->toArrayWithMapping());
//            $http = new HttpClient($url);
//        } else {
//            $param = $bean->__toString();
//            $http = new HttpClient($url);
//        }

        $url = $this->getUrl($bean);
        var_dump($url);
        $data = $this->toRequestJson($bean);
        var_dump($data);
        $http = new HttpClient($url);

        if ($http) {
            try{
//                if ($urlEncode) {
//                    $ret = $http->put()->getBody();
//                } else {
//                    $ret = $http->put($param)->getBody();
//                }
                $ret = $http->put($data)->getBody();
                var_dump($ret);
                return !empty($ret) ? json_decode($ret, true): null;
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl(static::class);
        }
    }

    /**
     * @param BaseCommand $bean
     * @param array       $headers
     * @return mixed|null
     * @throws InvalidUrl
     */
    protected function getJson(BaseCommand $bean, array $headers = [])
    {
//        if (!isset($useReflection['reflection'])) {
//            $url = $this->getRoute($bean, $action, $defaultRoot);
//        } else {
//            $url = $useReflection['url'];
//        }

//        $param = http_build_query($bean->toArrayWithMapping());
//        $url .= '?' . $param;
//        $http = new HttpClient($url);

        $url = $this->getUrl($bean);
        $data = $this->toRequestParam($bean);
        var_dump($data);
        $url = $data ? $url . '?' . $data : $url;
        var_dump($url);
        $http = new HttpClient($url);

        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                    var_dump($headers);
                }
                $ret = $http->get()->getBody();
                var_dump($ret);
                return !empty($ret) ? json_decode($ret, true): null;
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl('url is invalid');
        }
    }

    /**
     * @param BaseCommand $bean
     * @param array   $headers
     * @return mixed|null
     * @throws InvalidUrl
     */
    protected function postJson(BaseCommand $bean, array $headers = [])
    {
//        if (!isset($useReflection['reflection'])) {
//            $url = $this->getRoute($bean, $action, $defaultRoot);
//        } else {
//            $url = $useReflection['url'];
//        }
//        $param = json_encode($bean->toArrayWithMapping(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
//
//        $http = new HttpClient($url);

        $url = $this->getUrl($bean);
        var_dump($url);
        $data = $this->toRequestJson($bean);
        var_dump($data);
        $http = new HttpClient($url);

        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->postJson($data)->getBody();
                var_dump($ret);
                if (isset($ret) && !empty($ret)) {
                    $json = json_decode($ret,true);
                    return !empty($ret) ? json_decode($ret, true): null;
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
     * @param array   $headers
     * @return mixed|null
     * @throws InvalidUrl
     */
    protected function deleteJson(SplBean $bean, array $headers=[])
    {
//        if (!isset($useReflection['reflection'])) {
//            $url = $this->getRoute($bean, $action, $defaultRoot);
//        } else {
//            $url = $useReflection['url'];
//        }

//        $param = json_encode($bean->toArrayWithMapping(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
//
//        $http = new HttpClient($url);

        $url = $this->getUrl($bean);
        var_dump($url);
        $data = $this->toRequestJson($bean);
        var_dump($data);
        $http = new HttpClient($url);

        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                    var_dump($headers);
                }
                $ret = $http->delete()->getBody();
                if (isset($ret) && !empty($ret)) {
                    $json = json_decode($ret,true);
                    return !empty($ret) ? json_decode($ret, true): null;
                }
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl('url is invalid');
        }
    }

    private function getUrl(BaseCommand $bean): string
    {
        return $this->route . $bean->getUrl();
    }

    /**
     * 处理请求Request，过滤null值
     * @param SplBean $request
     * @return string
     */
    private function toRequestParam(BaseCommand $request): string
    {
        $data = array_filter($request->toArrayWithMapping(), function ($item) {
            // 只过滤null和空值
            if ($item === '' || $item === null) {
                return false;
            }
            return true;
        });
        unset($data['url']);
        return $data ? http_build_query($data) : '';
    }

    private function toRequestJson(BaseCommand $request): ?string
    {
        $data = array_filter($request->toArrayWithMapping(), function ($item) {
            // 只过滤null和空值
            if ($item === '' || $item === null) {
                return false;
            }
            return true;
        });
        unset($data['url']);

        return $data ? json_encode($data) : null;
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