<?php


namespace EasySwoole\Consul;


use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Kv;

class KVStore extends BaseFunc
{
    /**
     * Read Key
     * @param Kv $kv
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function kv(Kv $kv)
    {
        if (empty($kv->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        $kv->setUrl(sprintf($kv->getUrl(), $kv->getKey()));
        $kv->setKey('');
        $this->getJson($kv);
    }

    /**
     * Create Key
     * @param Kv $kv
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function create(Kv $kv)
    {
        if (empty($kv->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        $kv->setUrl(sprintf($kv->getUrl(), $kv->getKey()));
        $kv->setKey('');
        $this->putJSON($kv);
    }

    /**
     * Update Key
     * @param Kv $kv
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function update(Kv $kv)
    {
        if (empty($kv->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        $kv->setUrl(sprintf($kv->getUrl(), $kv->getKey()));
        $kv->setKey('');
        $this->putJSON($kv);
    }

    /**
     * Delete Key
     * @param Kv $kv
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function delete(Kv $kv)
    {
        if (empty($kv->getKey())) {
            throw new MissingRequiredParamsException('Missing the required param: key.');
        }
        $kv->setUrl(sprintf($kv->getUrl(), $kv->getKey()));
        $kv->setKey('');
        $this->deleteJson($kv);
    }
}