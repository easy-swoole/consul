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
    // 仅用于 SDK 内部拼接请求地址，不会被序列化到请求参数中。
    protected string $url = '';

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * 将 Bean 属性名转换为 Consul API 期望的字段名。
     *
     * SplBean 2.x 已移除旧版 toArrayWithMapping()，因此映射逻辑由本组件维护，
     * 避免继续依赖 SPL 的内部实现。
     *
     * @return array<string, mixed>
     */
    public function toArrayWithMapping(): array
    {
        $data = $this->toArray();

        foreach ($this->setKeyMapping() as $consulKey => $property) {
            if (array_key_exists($property, $data)) {
                $data[$consulKey] = $data[$property];
                if ($consulKey !== $property) {
                    unset($data[$property]);
                }
            }
        }

        return $data;
    }

    protected function setKeyMapping(): array
    {
        return [];
    }
}
