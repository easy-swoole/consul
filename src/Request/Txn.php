<?php
/**
 * Created by PhpStorm.
 * User: Manlin
 * Date: 2019/8/2
 * Time: 下午10:37
 */
namespace EasySwoole\Consul\Request;

use EasySwoole\Spl\SplBean;

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
class Txn extends SplBean
{
    /**
     * @var string
     */
    protected $dc;
    /**
     * @var array
     */
    protected $KV;
    /**
     * @var array
     */
    protected $Node;
    /**
     * @var array
     */
    protected $Service;
    /**
     * @var array
     */
    protected $Check;

    /**
     * @return null|string
     */
    public function getDc(): ?string
    {
        return $this->dc;
    }

    /**
     * @param string $dc
     */
    public function setDc(string $dc): void
    {
        $this->dc = $dc;
    }

    /**
     * @return array|null
     */
    public function getKV(): ?array
    {
        return $this->KV;
    }

    /**
     * @param array $KV
     */
    public function setKV(array $KV): void
    {
        $this->KV = $KV;
    }

    /**
     * @return array|null
     */
    public function getNode(): ?array
    {
        return $this->Node;
    }

    /**
     * @param array $Node
     */
    public function setNode(array $Node): void
    {
        $this->Node = $Node;
    }

    /**
     * @return array|null
     */
    public function getService(): ?array
    {
        return $this->Service;
    }

    /**
     * @param array $Service
     */
    public function setService(array $Service): void
    {
        $this->Service = $Service;
    }

    /**
     * @return array|null
     */
    public function getCheck(): ?array
    {
        return $this->Check;
    }

    /**
     * @param array $Check
     */
    public function setCheck(array $Check): void
    {
        $this->Check = $Check;
    }
}