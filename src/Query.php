<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午11:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Query\Execute;
use EasySwoole\Consul\Request\Query\Explain;

class Query extends BaseFunc
{
    /**
     * Create Prepared Query
     * @param Request\Query $query
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function query(\EasySwoole\Consul\Request\Query $query)
    {
        $query->setUrl(substr($query->getUrl(), 0, strlen($query->getUrl()) -3));
        $this->postJson($query);
    }

    /**
     * Read Prepared Query
     * @param Request\Query $query
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readQuery(\EasySwoole\Consul\Request\Query $query)
    {
        if (empty($query->getUuid())) {
            $query->setUrl(substr($query->getUrl(), 0, strlen($query->getUrl()) - 3));
        } else {
            $query->setUrl(sprintf($query->getUrl(), $query->getUuid()));
            $query->setUuid('');
        }
        $this->getJson($query);
    }

    /**
     * Update Prepared Query
     * @param Request\Query $query
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateQuery(\EasySwoole\Consul\Request\Query $query)
    {
        if (empty($query->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $query->setUrl(sprintf($query->getUrl(), $query->getUuid()));
        $query->setUuid('');
        $this->putJSON($query);
    }

    /**
     * Delete Prepared Query
     * @param Request\Query $query
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteQuery(\EasySwoole\Consul\Request\Query $query)
    {
        if (empty($query->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $query->setUrl(sprintf($query->getUrl(), $query->getUuid()));
        $query->setUuid('');
        $this->deleteJson($query);
    }

    /**
     * Execute Prepared Query
     * @param Execute $execute
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function execute(Execute $execute)
    {
        if (empty($execute->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $execute->setUrl(sprintf($execute->getUrl(), $execute->getUuid()));
        $execute->setUuid('');
        $this->getJson($execute);
    }

    /**
     * Explain Prepared Query
     * @param Explain $explain
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function explain(Explain $explain)
    {
        if (empty($explain->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $explain->setUrl(sprintf($explain->getUrl(), $explain->getUuid()));
        $explain->setUuid('');
        $this->getJson($explain);
    }
}