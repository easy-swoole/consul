<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/1
 * Time: 下午6:45
 */
namespace EasySwoole\Consul;


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
     * @throws \ReflectionException
     */
    public function roots(Roots $roots)
    {
        $this->getJson($roots);
    }

    /**
     * Get CA Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function configuration(Configuration $configuration)
    {
        $this->getJson($configuration);
    }

    /**
     * Update CA Configuration
     * @param Configuration $configuration
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function updateConfiguration(Configuration $configuration)
    {
        $this->putJSON($configuration);
    }

    /**
     * Create Intention
     * @param Intentions $intentions
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function intentions(Intentions $intentions)
    {
        $this->postJson($intentions);
    }

    /**
     * Read Specific Intention
     * @param Intentions $intentions
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function readIntention(Intentions $intentions)
    {
        $action = '';
        if (!empty($intentions->getuuid())) {
            $action = $intentions->getuuid();
            $intentions->setuuid('');
        }
        $this->getJson($intentions, $action);
    }

    /**
     * List Intentions
     * @param Intentions $intentions
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function listIntention(Intentions $intentions)
    {
        $this->getJson($intentions);
    }

    /**
     * Update Intention
     * @param Intentions $intentions
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function updateIntention(Intentions $intentions)
    {
        $action = '';
        if (!empty($intentions->getuuid())) {
            $action = $intentions->getuuid();
            $intentions->setuuid('');
        }
        $this->putJSON($intentions, $action);
    }

    /**
     * Delete Intention
     * @param Intentions $intentions
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function deleteIntention(Intentions $intentions)
    {
        $action = '';
        if (!empty($intentions->getuuid())) {
            $action = $intentions->getuuid();
            $intentions->setuuid('');
        }
        $this->deleteJson($intentions, $action);
    }

    /**
     * Check Intention Result
     * @param Check $check
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function check(Check $check)
    {
        $this->getJson($check);
    }

    /**
     * List Matching Intentions
     * @param Match $match
     * @throws \EasySwoole\HttpClient\Exception\InvalidUrl
     * @throws \ReflectionException
     */
    public function match(Match $match)
    {
        $this->getJson($match);
    }
}