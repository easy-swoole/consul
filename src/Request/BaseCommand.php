<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/9/8
 * Time: 下午12:55
 */
namespace EasySwoole\Consul\Request;

use EasySwoole\Spl\SplBean;

class BaseCommand extends SplBean
{
    /**
     * @var string
     */
    protected $url;// 请求的变化部分

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
