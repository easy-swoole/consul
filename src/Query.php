<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午11:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Request\Query\Execute;
use EasySwoole\Consul\Request\Query\Explain;

class Query extends BaseFunc
{
    /**
     * @param Query $query
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function query(\EasySwoole\Consul\Request\Query $query)
    {
        $this->postJson($query);
    }

    /**
     * Read Prepared Query
     * @param Query $query
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function readQuery(\EasySwoole\Consul\Request\Query $query)
    {
        if (!empty($query->getUuid())) {
            $action = $query->getUuid();
            $query->setUuid('');
            $this->getJson($query, $action);
        } else {
            $this->getJson($query);
        }
    }

    /**
     * Update Prepared Query
     * @param Request\Query $query
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function updateQuery(\EasySwoole\Consul\Request\Query $query)
    {
        $action = '';
        if (!empty($query->getUuid())) {
            $action = $query->getUuid();
            $query->setUuid('');
        }
        $this->putJSON($query, $action);
    }

    /**
     * Delete Prepared Query
     * @param Request\Query $query
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deleteQuery(\EasySwoole\Consul\Request\Query $query)
    {
        $action = '';
        if (!empty($query->getUuid())) {
            $action = $query->getUuid();
            $query->setUuid('');
        }
        $this->deleteJson($query, $action);
    }

    /**
     * Execute Prepared Query
     * @param Execute $execute
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function execute(Execute $execute)
    {
        $action = '';
        if (!empty($execute->getUuid())) {
            $action = $execute->getUuid();
            $execute->setUuid('');
        }
        $this->getJson($execute, $action,false);
    }

    /**
     * Explain Prepared Query
     * @param Explain $explain
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function explain(Explain $explain)
    {
        $action = '';
        if (!empty($execute->getUuid())) {
            $action = $execute->getUuid();
            $execute->setUuid('');
        }
        $this->getJson($execute, $action,[],false);
    }
}