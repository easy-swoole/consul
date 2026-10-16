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
    protected string $url = 'operator/autopilot/configuration';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var bool
     */
    protected ?bool $stale = null;
    /**
     * @var int
     */
    protected ?int $cas = null;
    /**
     * @var bool
     */
    protected ?bool $cleanupDeadServers = null;

    /**
     * @var string
     */
    protected ?string $lastContactThreshold = null;
    /**
     * @var int
     */
    protected ?int $maxTrailingLogs = null;
    /**
     * @var string
     */
    protected ?string $serverStabilizationTime = null;
    /**
     * @var string
     */
    protected ?string $redundancyZoneTag = null;
    /**
     * @var bool
     */
    protected ?bool $disableUpgradeMigration = null;
    /**
     * @var string
     */
    protected ?string $upgradeVersionTag = null;
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
    public function isCleanupDeadServers(): ?bool
    {
        return $this->cleanupDeadServers;
    }

    /**
     * @param bool $cleanupDeadServers
     */
    public function setCleanupDeadServers($cleanupDeadServers): void
    {
        $this->cleanupDeadServers = $cleanupDeadServers;
    }

    /**
     * @return string
     */
    public function getLastContactThreshold(): ?string
    {
        return $this->lastContactThreshold;
    }

    /**
     * @param string $lastContactThreshold
     */
    public function setLastContactThreshold($lastContactThreshold): void
    {
        $this->lastContactThreshold = $lastContactThreshold;
    }

    /**
     * @return int
     */
    public function getMaxTrailingLogs(): ?int
    {
        return $this->maxTrailingLogs;
    }

    /**
     * @param int $maxTrailingLogs
     */
    public function setMaxTrailingLogs($maxTrailingLogs): void
    {
        $this->maxTrailingLogs = $maxTrailingLogs;
    }

    /**
     * @return string
     */
    public function getServerStabilizationTime(): ?string
    {
        return $this->serverStabilizationTime;
    }

    /**
     * @param string $serverStabilizationTime
     */
    public function setServerStabilizationTime($serverStabilizationTime): void
    {
        $this->serverStabilizationTime = $serverStabilizationTime;
    }

    /**
     * @return string
     */
    public function getRedundancyZoneTag(): ?string
    {
        return $this->redundancyZoneTag;
    }

    /**
     * @param string $redundancyZoneTag
     */
    public function setRedundancyZoneTag($redundancyZoneTag): void
    {
        $this->redundancyZoneTag = $redundancyZoneTag;
    }

    /**
     * @return bool
     */
    public function isDisableUpgradeMigration(): ?bool
    {
        return $this->disableUpgradeMigration;
    }

    /**
     * @param bool $disableUpgradeMigration
     */
    public function setDisableUpgradeMigration($disableUpgradeMigration): void
    {
        $this->disableUpgradeMigration = $disableUpgradeMigration;
    }

    /**
     * @return string
     */
    public function getUpgradeVersionTag(): ?string
    {
        return $this->upgradeVersionTag;
    }

    /**
     * @param string $upgradeVersionTag
     */
    public function setUpgradeVersionTag($upgradeVersionTag): void
    {
        $this->upgradeVersionTag = $upgradeVersionTag;
    }

    protected function setKeyMapping(): array
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
