<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/7/31
 * Time: 下午7:01
 */
namespace EasySwoole\Consul\Request\Acl\Token;

use EasySwoole\Consul\Request\BaseCommand;

class CloneToken extends BaseCommand
{
    protected $url = 'acl/token/%s/clone';

    /**
     * @var string
     */
    protected $accessorID;
    /**
     * @var string
     */
    protected $description;

    /**
     * @return string
     */
    public function getAccessorID()
    {
        return $this->accessorID;
    }

    /**
     * @param string $accessorID
     */
    public function setAccessorID($accessorID)
    {
        $this->accessorID = $accessorID;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    protected function setKeyMapping(): array
    {
        return [
            'AccessorID' => 'accessorID',
            'Description' => 'description',
        ];
    }
}
