<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午11:19
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\QueryInterface;
use EasySwoole\Consul\Exception\MissingRequiredParameterException;
use EasySwoole\Consul\Request\Query\Execute;
use EasySwoole\Consul\Request\Query\Explain;

class Query extends AbstractEndpoint implements QueryInterface
{
    /**
     * Create Prepared Query
     * @param Request\Query $query
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function query(\EasySwoole\Consul\Request\Query $query): mixed
    {
        $query->setUrl(substr($query->getUrl(), 0, strlen($query->getUrl()) -3));
        return $this->postJson($query);
    }

    /**
     * Read Prepared Query
     * @param Request\Query $query
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readQuery(\EasySwoole\Consul\Request\Query $query): mixed
    {
        if (empty($query->getUuid())) {
            $query->setUrl(substr($query->getUrl(), 0, strlen($query->getUrl()) - 3));
        } else {
            $query->setUrl(sprintf($query->getUrl(), $query->getUuid()));
            $query->setUuid('');
        }
        return $this->getJson($query);
    }

    /**
     * Update Prepared Query
     * @param Request\Query $query
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateQuery(\EasySwoole\Consul\Request\Query $query): mixed
    {
        if (empty($query->getUuid())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $query->setUrl(sprintf($query->getUrl(), $query->getUuid()));
        $query->setUuid('');
        return $this->putJson($query);
    }

    /**
     * Delete Prepared Query
     * @param Request\Query $query
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteQuery(\EasySwoole\Consul\Request\Query $query): mixed
    {
        if (empty($query->getUuid())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $query->setUrl(sprintf($query->getUrl(), $query->getUuid()));
        $query->setUuid('');
        return $this->deleteJson($query);
    }

    /**
     * Execute Prepared Query
     * @param Execute $execute
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function execute(Execute $execute): mixed
    {
        if (empty($execute->getUuid())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $execute->setUrl(sprintf($execute->getUrl(), $execute->getUuid()));
        $execute->setUuid('');
        return $this->getJson($execute);
    }

    /**
     * Explain Prepared Query
     * @param Explain $explain
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function explain(Explain $explain): mixed
    {
        if (empty($explain->getUuid())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $explain->setUrl(sprintf($explain->getUrl(), $explain->getUuid()));
        $explain->setUuid('');
        return $this->getJson($explain);
    }
}
