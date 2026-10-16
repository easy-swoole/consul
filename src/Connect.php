<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午6:45
 */
namespace EasySwoole\Consul;

use EasySwoole\Consul\ConsulInterface\ConnectInterface;
use EasySwoole\Consul\Exception\MissingRequiredParameterException;
use EasySwoole\Consul\Request\Connect\Ca\Configuration;
use EasySwoole\Consul\Request\Connect\Ca\Roots;
use EasySwoole\Consul\Request\Connect\Intentions;
use EasySwoole\Consul\Request\Connect\Intentions\Check;
use EasySwoole\Consul\Request\Connect\Intentions\IntentionMatch;

class Connect extends AbstractEndpoint implements ConnectInterface
{
    /**
     * List CA Root Certificates
     * @param Roots $roots
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function roots(Roots $roots): mixed
    {
        return $this->getJson($roots);
    }

    /**
     * Get CA Configuration
     * @param Configuration $configuration
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function configuration(Configuration $configuration): mixed
    {
        return $this->getJson($configuration);
    }

    /**
     * Update CA Configuration
     * @param Configuration $configuration
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateConfiguration(Configuration $configuration): mixed
    {
        if (empty($configuration->getProvider())) {
            throw new MissingRequiredParameterException('Missing the required param: Provider.');
        }
        if (empty($configuration->getConfig())) {
            throw new MissingRequiredParameterException('Missing the required param: Config.');
        }
        return $this->putJson($configuration);
    }

    /**
     * Create Intention
     * @param Intentions $intentions
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function intentions(Intentions $intentions): mixed
    {
        if (empty($intentions->getSourceName())) {
            throw new MissingRequiredParameterException('Missing the required param: SourceName.');
        }
        if (empty($intentions->getDestinationName())) {
            throw new MissingRequiredParameterException('Missing the required param: DestinationName.');
        }
        if (empty($intentions->getSourceType())) {
            throw new MissingRequiredParameterException('Missing the required param: SourceType.');
        }
        if (empty($intentions->getAction())) {
            throw new MissingRequiredParameterException('Missing the required param: Action.');
        }
        $intentions->setUrl(substr($intentions->getUrl(), 0, strlen($intentions->getUrl()) -3));
        return $this->postJson($intentions);
    }

    /**
     * Read Specific Intention
     * @param Intentions $intentions
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function readIntention(Intentions $intentions): mixed
    {
        if (empty($intentions->getUuid())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $intentions->setUrl(sprintf($intentions->getUrl(), $intentions->getUuid()));
        $intentions->setUuid('');
        return $this->getJson($intentions);
    }

    /**
     * List Intentions
     * @param Intentions $intentions
     * @return mixed
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function listIntention(Intentions $intentions): mixed
    {
        $intentions->setUrl(substr($intentions->getUrl(), 0, strlen($intentions->getUrl()) -3));
        return $this->getJson($intentions);
    }

    /**
     * Update Intention
     * @param Intentions $intentions
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function updateIntention(Intentions $intentions): mixed
    {
        if (empty($intentions->getUuid())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $intentions->setUrl(sprintf($intentions->getUrl(), $intentions->getUuid()));
        $intentions->setUuid('');
        return $this->putJson($intentions);
    }

    /**
     * Delete Intention
     * @param Intentions $intentions
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function deleteIntention(Intentions $intentions): mixed
    {
        if (empty($intentions->getUuid())) {
            throw new MissingRequiredParameterException('Missing the required param: uuid.');
        }
        $intentions->setUrl(sprintf($intentions->getUrl(), $intentions->getUuid()));
        $intentions->setUuid('');
        return $this->deleteJson($intentions);
    }

    /**
     * Check Intention Result
     * @param Check $check
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function check(Check $check): mixed
    {
        if (empty($check->getSource())) {
            throw new MissingRequiredParameterException('Missing the required param: source.');
        }
        if (empty($check->getDestination())) {
            throw new MissingRequiredParameterException('Missing the required param: destination.');
        }
        return $this->getJson($check);
    }

    /**
     * List Matching Intentions
     * @param IntentionMatch $match
     * @return mixed
     * @throws MissingRequiredParameterException
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     */
    public function match(IntentionMatch $match): mixed
    {
        if (empty($match->getBy())) {
            throw new MissingRequiredParameterException('Missing the required param: by.');
        }
        if (empty($match->getName())) {
            throw new MissingRequiredParameterException('Missing the required param: name.');
        }
        return $this->getJson($match);
    }
}
