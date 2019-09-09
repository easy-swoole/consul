<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\BaseCommand;
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
     * @param BaseCommand $bean
     * @return mixed|null
     * @throws InvalidUrl
     * @throws \Exception
     */
    protected function putJSON(BaseCommand $bean)
    {
        $url = $this->getUrl($bean);
        $data = $this->toRequestJson($bean);
        $http = new HttpClient($url);

        if ($http) {
            try{
                $ret = $http->put($data)->getBody();
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
     * @throws \Exception
     */
    protected function getJson(BaseCommand $bean, array $headers = [])
    {
        $url = $this->getUrl($bean);
        $data = $this->toRequestParam($bean);
        $url = $data ? $url . '?' . $data : $url;
        $http = new HttpClient($url);

        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->get()->getBody();
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
     * @throws \Exception
     */
    protected function postJson(BaseCommand $bean, array $headers = [])
    {
        $url = $this->getUrl($bean);
        $data = $this->toRequestJson($bean);
        $http = new HttpClient($url);

        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->postJson($data)->getBody();
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
     * @throws \Exception
     */
    protected function deleteJson(BaseCommand $bean, array $headers=[])
    {
        $url = $this->getUrl($bean);
        $data = $this->toRequestJson($bean);
        $http = new HttpClient($url);

        if ($http) {
            try{
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                $ret = $http->delete()->getBody();
                return !empty($ret) ? json_decode($ret, true): null;
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
}