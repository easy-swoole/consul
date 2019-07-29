<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/30
 * Time: 上午12:47
 */
namespace EasySwoole\Consul\Request\Agent\Check;

use EasySwoole\Spl\SplBean;

class Warn extends SplBean
{
    /**
     * @var string
     */
    protected $check_id;
    /**
     * @var string
     */
    protected $note;

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