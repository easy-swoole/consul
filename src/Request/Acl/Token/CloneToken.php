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
    protected string $url = 'acl/token/%s/clone';

    /**
     * @var string
     */
    protected ?string $accessorID = null;
    /**
     * @var string
     */
    protected ?string $description = null;

    /**
     * @return string
     */
    public function getAccessorID(): ?string
    {
        return $this->accessorID;
    }

    /**
     * @param string $accessorID
     */
    public function setAccessorID($accessorID): void
    {
        $this->accessorID = $accessorID;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description): void
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
