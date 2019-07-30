<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/30
 * Time: 上午12:50
 */
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Spl\SplBean;

class Update extends SplBean
{
    /**
     * @var string
     */
    protected $check_id;
    /**
     * Valid values are "passing", "warning", and "critical"
     * @var string
     */
    protected $Status;
    /**
     * @var string
     */
    protected $Output;

    /**
     * @return null|string
     */
    public function getCheckId(): ?string
    {
        return $this->check_id;
    }

    /**
     * @param string $checkId
     */
    public function setCheckId(string $checkId): void
    {
        $this->check_id = $checkId;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->Status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->Status = $status;
    }

    /**
     * @return null|string
     */
    public function getOutput(): ?string
    {
        return $this->Output;
    }

    /**
     * @param string $output
     */
    public function setOutput(string $output): void
    {
        $this->Output = $output;
    }
}