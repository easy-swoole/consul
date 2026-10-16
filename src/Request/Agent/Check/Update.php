<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/30
 * Time: 上午12:50
 */
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Consul\Request\BaseCommand;

class Update extends BaseCommand
{
    protected string $url = 'agent/check/update/%s';

    /**
     * @var string
     */
    protected ?string $check_id = null;
    /**
     * Valid values are "passing", "warning", and "critical"
     * @var string
     */
    protected ?string $status = null;
    /**
     * @var string
     */
    protected ?string $output = null;

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
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getOutput(): ?string
    {
        return $this->output;
    }

    /**
     * @param string $output
     */
    public function setOutput($output): void
    {
        $this->output = $output;
    }

    protected function setKeyMapping(): array
    {
        return [
            'Status' => 'status',
            'Output' => 'output',
        ];
    }
}
