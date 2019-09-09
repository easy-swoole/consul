<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 上午1:15
 */
namespace EasySwoole\Consul\Request\Operator\Autopilot;

use EasySwoole\Consul\Request\BaseCommand;

class Configuration extends BaseCommand
{
    protected $url = 'operator/autopilot/configuration';

    /**
     * @var string
     */
    protected $dc;
    /**
     * @var bool
     */
    protected $stale;
    /**
     * @var int
     */
    protected $cas;
    /**
     * @var bool
     */
    protected $cleanupDeadServers;

    /**
     * @var string
     */
    protected $lastContactThreshold;
    /**
     * @var int
     */
    protected $maxTrailingLogs;
    /**
     * @var string
     */
    protected $serverStabilizationTime;
    /**
     * @var string
     */
    protected $redundancyZoneTag;
    /**
     * @var bool
     */
    protected $disableUpgradeMigration;
    /**
     * @var string
     */
    protected $upgradeVersionTag;
    /**
     * @return null|string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc(string $dc): void
    {
        $this->dc = $dc;
    }

    /**
     * @return bool|null
     */
    public function getStale(): ?bool
    {
        return $this->stale;
    }

    /**
     * @param bool $stale
     */
    public function setStale(bool $stale): void
    {
        $this->stale = $stale;
    }

    /**
     * @return int|null
     */
    public function getCas(): ?int
    {
        return $this->cas;
    }

    /**
     * @param int $cas
     */
    public function setCas(int $cas): void 
    {
        $this->cas = $cas;
    }

    /**
     * @return bool
     */
    public function isCleanupDeadServers ()
    {
        return $this->cleanupDeadServers;
    }

    /**
     * @param bool $cleanupDeadServers
     */
    public function setCleanupDeadServers ($cleanupDeadServers)
    {
        $this->cleanupDeadServers = $cleanupDeadServers;
    }

    /**
     * @return string
     */
    public function getLastContactThreshold ()
    {
        return $this->lastContactThreshold;
    }

    /**
     * @param string $lastContactThreshold
     */
    public function setLastContactThreshold ($lastContactThreshold)
    {
        $this->lastContactThreshold = $lastContactThreshold;
    }

    /**
     * @return int
     */
    public function getMaxTrailingLogs ()
    {
        return $this->maxTrailingLogs;
    }

    /**
     * @param int $maxTrailingLogs
     */
    public function setMaxTrailingLogs ($maxTrailingLogs)
    {
        $this->maxTrailingLogs = $maxTrailingLogs;
    }

    /**
     * @return string
     */
    public function getServerStabilizationTime ()
    {
        return $this->serverStabilizationTime;
    }

    /**
     * @param string $serverStabilizationTime
     */
    public function setServerStabilizationTime ($serverStabilizationTime)
    {
        $this->serverStabilizationTime = $serverStabilizationTime;
    }

    /**
     * @return string
     */
    public function getRedundancyZoneTag ()
    {
        return $this->redundancyZoneTag;
    }

    /**
     * @param string $redundancyZoneTag
     */
    public function setRedundancyZoneTag ($redundancyZoneTag)
    {
        $this->redundancyZoneTag = $redundancyZoneTag;
    }

    /**
     * @return bool
     */
    public function isDisableUpgradeMigration ()
    {
        return $this->disableUpgradeMigration;
    }

    /**
     * @param bool $disableUpgradeMigration
     */
    public function setDisableUpgradeMigration ($disableUpgradeMigration)
    {
        $this->disableUpgradeMigration = $disableUpgradeMigration;
    }

    /**
     * @return string
     */
    public function getUpgradeVersionTag ()
    {
        return $this->upgradeVersionTag;
    }

    /**
     * @param string $upgradeVersionTag
     */
    public function setUpgradeVersionTag ($upgradeVersionTag)
    {
        $this->upgradeVersionTag = $upgradeVersionTag;
    }

    protected function setKeyMapping (): array
    {
        return [
            'CleanupDeadServers' => 'cleanupDeadServers',
            'LastContactThreshold' => 'lastContactThreshold',
            'MaxTrailingLogs' => 'maxTrailingLogs',
            'ServerStabilizationTime' => 'serverStabilizationTime',
            'RedundancyZoneTag' => 'redundancyZoneTag',
            'DisableUpgradeMigration' => 'disableUpgradeMigration',
            'UpgradeVersionTag' => 'upgradeVersionTag',
        ];
    }
}