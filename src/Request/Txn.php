<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:37
 */
namespace EasySwoole\Consul\Request;

/**
 * Sample
[
  {
      "KV": {
      "Verb": "<verb>",
      "Key": "<key>",
      "Value": "<Base64-encoded blob of data>",
      "Flags": <flags>,
      "Index": <index>,
      "Session": "<session id>"
    }
  },
  {
      "Node": {
      "Verb": "set",
      "Node": {
          "ID": "67539c9d-b948-ba67-edd4-d07a676d6673",
        "Node": "bar",
        "Address": "192.168.0.1",
        "Datacenter": "dc1",
        "Meta": {
              "instance_type": "m2.large"
        }
      }
    }
  },
  {
      "Service": {
      "Verb": "delete",
      "Node": "foo",
      "Service": {
          "ID": "db1"
      }
    }
  },
  {
      "Check": {
      "Verb": "cas",
      "Check": {
          "Node": "bar",
        "CheckID": "service:web1",
        "Name": "Web HTTP Check",
        "Status": "critical",
        "ServiceID": "web1",
        "ServiceName": "web",
        "ServiceTags": null,
        "Definition": {
              "HTTP": "http://localhost:8080",
          "Interval": "10s"
        },
        "ModifyIndex": 22
      }
    }
  }
]

 * Class Txn
 * @package EasySwoole\Consul\Request
 */
class Txn extends BaseCommand
{
    protected string $url = 'txn';

    /**
     * @var string
     */
    protected ?string $dc = null;
    /**
     * @var array
     */
    protected ?array $kv = null;
    /**
     * @var array
     */
    protected ?array $node = null;
    /**
     * @var array
     */
    protected ?array $service = null;
    /**
     * @var array
     */
    protected ?array $check = null;

    /**
     * @return string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc($dc): void
    {
        $this->dc = $dc;
    }

    /**
     * @return array
     */
    public function getKv(): ?array
    {
        return $this->kv;
    }

    /**
     * @param array $kv
     */
    public function setKv($kv): void
    {
        $this->kv = $kv;
    }

    /**
     * @return array
     */
    public function getNode(): ?array
    {
        return $this->node;
    }

    /**
     * @param array $node
     */
    public function setNode($node): void
    {
        $this->node = $node;
    }

    /**
     * @return array
     */
    public function getService(): ?array
    {
        return $this->service;
    }

    /**
     * @param array $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }

    /**
     * @return array
     */
    public function getCheck(): ?array
    {
        return $this->check;
    }

    /**
     * @param array $check
     */
    public function setCheck($check): void
    {
        $this->check = $check;
    }

    protected function setKeyMapping(): array
    {
        return [
            'KV' => 'kv',
            'Node' => 'node',
            'Service' => 'service',
            'Check' => 'check',
        ];
    }
}
