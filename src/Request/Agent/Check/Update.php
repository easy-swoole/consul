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
    protected $url = 'agent/check/update/%s';

    /**
     * @var string
     */
    protected $check_id;
    /**
     * Valid values are "passing", "warning", and "critical"
     * @var string
     */
    protected $status;
    /**
     * @var string
     */
    protected $output;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param string $output
     */
    public function setOutput($output)
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
