<?php
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\Exception;
use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\HttpClient\Bean\Response;
use EasySwoole\HttpClient\Exception\InvalidUrl;
use EasySwoole\HttpClient\HttpClient;

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
     * @param bool        $isJsonParams
     * @return mixed
     * @throws InvalidUrl
     * @throws \Exception
     */
    protected function putJSON(BaseCommand $bean, $isJsonParams = true)
    {
        $url = $this->getUrl($bean);
        $data = $this->toRequestJson($bean);
        if (! $isJsonParams) {
            $data = $this->toRequestParam($bean);
            $url = $data ? $url . '?' . $data : $url;
        }

        $http = new HttpClient($url);
        if ($http) {
            try {
                return $this->checkResponse($http->put($data));
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
     * @return mixed
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
            try {
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                return $this->checkResponse($http->get());
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl('url is invalid');
        }
    }

    /**
     * @param BaseCommand $bean
     * @param array       $headers
     * @return mixed
     * @throws InvalidUrl
     * @throws \Exception
     */
    protected function postJson(BaseCommand $bean, array $headers = [])
    {
        $url = $this->getUrl($bean);
        $data = $this->toRequestJson($bean);
        $http = new HttpClient($url);

        if ($http) {
            try {
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                return $this->checkResponse($http->postJson($data));
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl('url is invalid');
        }
    }

    /**
     * @param BaseCommand $bean
     * @param array       $headers
     * @return mixed
     * @throws InvalidUrl
     * @throws \Exception
     */
    protected function deleteJson(BaseCommand $bean, array $headers = [])
    {
        $url = $this->getUrl($bean);
        $data = $this->toRequestParam($bean);
        $url = $data ? $url . '?' . $data : $url;
        $http = new HttpClient($url);
        if ($http) {
            try {
                if (isset($headers) && !empty($headers)) {
                    foreach ($headers as $headerKey => $headerVal) {
                        $http->setHeader($headerKey, $headerVal);
                    }
                }
                return $this->checkResponse($http->delete());
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage());
            }
        } else {
            throw new InvalidUrl('url is invalid');
        }
    }

    /**
     * @param Response $consulResponse
     * @return mixed
     * @throws Exception
     */
    private function checkResponse(Response $consulResponse)
    {
        // 网络响应失败
        if ($consulResponse->getErrCode()) {
            throw new Exception('Consul Network Error: ' . $consulResponse->getErrMsg());
        }

        // 错误请求状态码
        if ($consulResponse->getStatusCode() >= 400) {
            $reason = isset($consulResponse->getHeaders()['x-consul-reason']) ?
                $consulResponse->getHeaders()['x-consul-reason'] : '';
            $reason = $reason ?: $consulResponse->getBody();
            throw new Exception(sprintf(
                'Consul Request Error (Status Code: %d, Reason: %s)',
                $consulResponse->getStatusCode(),
                $reason
            ));
        };
        // 解码请求内容
        $contentJson = $consulResponse->getBody();
        $contentArr = json_decode($contentJson, true);

        return $contentArr;
    }

    private function getUrl(BaseCommand $bean): string
    {
        return $this->route . $bean->getUrl();
    }

    /**
     * 处理请求Request，过滤null值
     * @param BaseCommand $request
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
