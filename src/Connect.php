<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午6:45
 */
namespace EasySwoole\Consul;


use EasySwoole\Consul\Exception\MissingRequiredParamsException;
use EasySwoole\Consul\Request\Connect\Ca\Configuration;
use EasySwoole\Consul\Request\Connect\Ca\Roots;
use EasySwoole\Consul\Request\Connect\Intentions;
use EasySwoole\Consul\Request\Connect\Intentions\Check;
use EasySwoole\Consul\Request\Connect\Intentions\Match;

class Connect extends BaseFunc
{
    /**
     * List CA Root Certificates
     * @param Roots $roots
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function roots(Roots $roots)
    {
        $this->getJson($roots);
    }

    /**
     * Get CA Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function configuration(Configuration $configuration)
    {
        $this->getJson($configuration);
    }

    /**
     * Update CA Configuration
     * @param Configuration $configuration
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateConfiguration(Configuration $configuration)
    {
        if (empty($configuration->getProvider())) {
            throw new MissingRequiredParamsException('Missing the required param: Provider.');
        }
        if (empty($configuration->getConfig())) {
            throw new MissingRequiredParamsException('Missing the required param: Config.');
        }
        $this->putJSON($configuration);
    }

    /**
     * Create Intention
     * @param Intentions $intentions
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function intentions(Intentions $intentions)
    {
        if (empty($intentions->getSourceName())) {
            throw new MissingRequiredParamsException('Missing the required param: SourceName.');
        }
        if (empty($intentions->getDestinationName())) {
            throw new MissingRequiredParamsException('Missing the required param: DestinationName.');
        }
        if (empty($intentions->getSourceType())) {
            throw new MissingRequiredParamsException('Missing the required param: SourceType.');
        }
        if (empty($intentions->getAction())) {
            throw new MissingRequiredParamsException('Missing the required param: Action.');
        }
        $intentions->setUrl(substr($intentions->getUrl(), 0, strlen($intentions->getUrl()) -3));
        $this->postJson($intentions);
    }

    /**
     * Read Specific Intention
     * @param Intentions $intentions
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readIntention(Intentions $intentions)
    {
        if (empty($intentions->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $intentions->setUrl(sprintf($intentions->getUrl(), $intentions->getUuid()));
        $intentions->setUuid('');
        $this->getJson($intentions);
    }

    /**
     * List Intentions
     * @param Intentions $intentions
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function listIntention(Intentions $intentions)
    {
        $intentions->setUrl(substr($intentions->getUrl(), 0, strlen($intentions->getUrl()) -3));
        $this->getJson($intentions);
    }

    /**
     * Update Intention
     * @param Intentions $intentions
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateIntention(Intentions $intentions)
    {
        if (empty($intentions->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $intentions->setUrl(sprintf($intentions->getUrl(), $intentions->getUuid()));
        $intentions->setUuid('');
        $this->putJSON($intentions);
    }

    /**
     * Delete Intention
     * @param Intentions $intentions
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteIntention(Intentions $intentions)
    {
        if (empty($intentions->getUuid())) {
            throw new MissingRequiredParamsException('Missing the required param: uuid.');
        }
        $intentions->setUrl(sprintf($intentions->getUrl(), $intentions->getUuid()));
        $intentions->setUuid('');
        $this->deleteJson($intentions);
    }

    /**
     * Check Intention Result
     * @param Check $check
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function check(Check $check)
    {
        if (empty($check->getSource())) {
            throw new MissingRequiredParamsException('Missing the required param: source.');
        }
        if (empty($check->getDestination())) {
            throw new MissingRequiredParamsException('Missing the required param: destination.');
        }
        $this->getJson($check);
    }

    /**
     * List Matching Intentions
     * @param Match $match
     * @throws MissingRequiredParamsException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function match(Match $match)
    {
        if (empty($match->getBy())) {
            throw new MissingRequiredParamsException('Missing the required param: by.');
        }
        if (empty($match->getName())) {
            throw new MissingRequiredParamsException('Missing the required param: name.');
        }
        $this->getJson($match);
    }
}