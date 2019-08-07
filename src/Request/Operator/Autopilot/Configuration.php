<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/3
 * Time: 上午1:15
 */
namespace EasySwoole\Consul\Request\Operator\Autopilot;

use EasySwoole\Spl\SplBean;

class Configuration extends SplBean
{
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
    protected $CleanupDeadServers;

    /**
     * @var string
     */
    protected $LastContactThreshold;
    /**
     * @var int
     */
    protected $MaxTrailingLogs;
    /**
     * @var string
     */
    protected $ServerStabilizationTime;
    /**
     * @var string
     */
    protected $RedundancyZoneTag;
    /**
     * @var bool
     */
    protected $DisableUpgradeMigration;
    /**
     * @var string
     */
    protected $UpgradeVersionTag;
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
     * @return bool|null
     */
    public function getCleanupDeadServers(): ?bool 
    {
        return $this->CleanupDeadServers;
    }

    /**
     * @param bool $CleanupDeadServers
     */
    public function setCleanupDeadServers(bool $CleanupDeadServers): void 
    {
        $this->CleanupDeadServers = $CleanupDeadServers;
    }

    /**
     * @return null|string
     */
    public function getLastContactThreshold(): ?string 
    {
        return $this->LastContactThreshold;
    }

    /**
     * @param string $LastContactThreshold
     */
    public function setLastContactThreshold(string $LastContactThreshold): void 
    {
        $this->LastContactThreshold = $LastContactThreshold;
    }

    /**
     * @return int|null
     */
    public function getMaxTrailingLogs(): ?int
    {
        return $this->MaxTrailingLogs;
    }

    /**
     * @param int $MaxTrailingLogs
     */
    public function setMaxTrailingLogs(int $MaxTrailingLogs): void 
    {
        $this->MaxTrailingLogs = $MaxTrailingLogs;
    }

    /**
     * @return null|string
     */
    public function getServerStabilizationTime(): ?string 
    {
        return $this->ServerStabilizationTime;
    }

    /**
     * @param string $ServerStabilizationTime
     */
    public function setServerStabilizationTime(string $ServerStabilizationTime): void 
    {
        $this->ServerStabilizationTime = $ServerStabilizationTime;
    }

    /**
     * @return null|string
     */
    public function getRedundancyZoneTag(): ?string 
    {
        return $this->RedundancyZoneTag;
    }

    /**
     * @param string $RedundancyZoneTag
     */
    public function setRedundancyZoneTag(string $RedundancyZoneTag): void 
    {
        $this->RedundancyZoneTag = $RedundancyZoneTag;
    }

    /**
     * @return bool|null
     */
    public function getDisableUpgradeMigration(): ?bool 
    {
        return $this->DisableUpgradeMigration;
    }

    /**
     * @param bool $DisableUpgradeMigration
     */
    public function setDisableUpgradeMigration(bool $DisableUpgradeMigration): void 
    {
        $this->DisableUpgradeMigration = $DisableUpgradeMigration;
    }

    /**
     * @return null|string
     */
    public function getUpgradeVersionTag(): ?string
    {
        return $this->UpgradeVersionTag;
    }

    /**
     * @param string $UpgradeVersionTag
     */
    public function setUpgradeVersionTag(string $UpgradeVersionTag): void
    {
        $this->UpgradeVersionTag = $UpgradeVersionTag;
    }
}