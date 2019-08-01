<?php


namespace EasySwoole\Consul;


use EasySwoole\Consul\Request\Kv;

class KVStore extends BaseFunc
{
    /**
     * Read Key
     * @param Kv $kv
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function kv(Kv $kv)
    {
        if (!empty($kv->getKey())) {
            $action = $kv->getKey();
            $kv->setKey('');
        }
        $this->getJson($kv, $action);
    }

    /**
     * Create Key
     * @param Kv $kv
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function create(Kv $kv)
    {
        if (!empty($kv->getKey())) {
            $action = $kv->getKey();
            $kv->setKey('');
        }
        $this->putJSON($kv, $action);
    }

    /**
     * Update Key
     * @param Kv $kv
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function update(Kv $kv)
    {
        if (!empty($kv->getKey())) {
            $action = $kv->getKey();
            $kv->setKey('');
        }
        $this->putJSON($kv, $action);
    }

    /**
     * Delete Key
     * @param Kv $kv
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function delete(Kv $kv)
    {
        if (!empty($kv->getKey())) {
            $action = $kv->getKey();
            $kv->setKey('');
        }
        $this->deleteJson($kv, $action);
    }
}