<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/30
 * Time: 上午12:44
 */
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Consul\Request\BaseCommand;

class Pass extends BaseCommand
{
    protected string $url = 'agent/check/pass/%s';

    /**
     * @var string
     */
    protected ?string $check_id = null;
    /**
     * @var string
     */
    protected ?string $note = null;

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
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }
}
