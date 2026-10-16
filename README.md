# EasySwoole Consul

基于 EasySwoole HTTP Client 的 Consul HTTP API 客户端。

当前分支面向 PHP 8.1 及以上版本，采用强类型、可替换 Transport 和按职责拆分的请求序列化设计。

## 环境要求

- PHP 8.1 或更高版本
- Swoole 扩展
- EasySwoole HTTP Client 1.6 或更高版本
- EasySwoole SPL 2.1 或更高版本

## 安装

```bash
composer require easyswoole/consul
```

## 快速开始

```php
<?php

use EasySwoole\Consul\ClientConfig;
use EasySwoole\Consul\ConsulClient;
use EasySwoole\Consul\Request\Status\Leader;
use Swoole\Coroutine;

$config = new ClientConfig(
    host: '127.0.0.1',
    port: 8500,
    apiVersion: 'v1',
    scheme: 'http',
);

$consul = new ConsulClient($config);

Coroutine\run(function () use ($consul): void {
    $leader = $consul->status()->leader(new Leader(['dc' => 'dc1']));
    var_dump($leader);
});
```

`ClientConfig` 默认连接 `http://127.0.0.1:8500/v1/`。构造时会校验主机、端口、API 版本和协议，协议只允许 `http` 或 `https`。

## 客户端入口

`ConsulClient` 按需创建端点对象，同一客户端内会复用已经创建的端点。

| 方法 | Consul API |
| --- | --- |
| `kv()` | KV 存储 |
| `agent()` | Agent、服务和健康检查 |
| `catalog()` | Catalog |
| `health()` | Health |
| `acl()` | ACL |
| `configuration()` | Config Entries |
| `connect()` | Consul Connect |
| `coordinates()` | Network Coordinates |
| `events()` | Events |
| `queries()` | Prepared Queries |
| `sessions()` | Sessions |
| `snapshots()` | Snapshots |
| `status()` | Status |
| `transactions()` | Transactions |
| `operator()` | Operator |

## 请求对象

每个 API 方法接收对应的请求对象。可以在构造函数中传入数组，也可以使用 setter：

```php
use EasySwoole\Consul\Request\Status\Leader;

$request = new Leader(['dc' => 'dc1']);

// 等价写法
$request = new Leader();
$request->setDc('dc1');
```

推荐优先使用类中声明的属性名或 setter，组件会通过字段映射转换为 Consul API 所需的字段名。`null` 和空字符串不会被发送；`false` 和 `0` 具有明确业务语义，会被保留。

查询参数按照 RFC 3986 编码。例如空格会编码为 `%20`，而不是 `+`。

## KV 存储

### 写入、读取和删除

```php
use EasySwoole\Consul\Request\Kv;

Coroutine\run(function () use ($consul): void {
    $written = $consul->kv()->put(
        new Kv([
            'key' => 'config/app name',
            'cas' => 0,
        ]),
        'raw-value',
    );

    $records = $consul->kv()->read(new Kv([
        'key' => 'config/app name',
    ]));

    $value = base64_decode($records[0]['Value'], true);

    $deleted = $consul->kv()->delete(new Kv([
        'key' => 'config/app name',
    ]));
});
```

KV 的值会作为原始 HTTP 请求体发送，不会被 JSON 编码。Consul 的 KV 查询响应中，`Value` 通常为 Base64 编码内容，需要由调用方解码。

## 服务注册

```php
use EasySwoole\Consul\Request\Agent\Service\Register;
use EasySwoole\Consul\Request\Agent\Services;

Coroutine\run(function () use ($consul): void {
    $consul->agent()->serviceRegister(new Register([
        'name' => 'orders',
        'id' => 'orders-1',
        'address' => '10.0.0.8',
        'port' => 8080,
        'meta' => ['version' => 'v2'],
        'enableTagOverride' => false,
    ]));

    $services = $consul->agent()->services(new Services());
});
```

注销服务：

```php
use EasySwoole\Consul\Request\Agent\Service\DeRegister;

$consul->agent()->serviceDeregister(new DeRegister([
    'service_id' => 'orders-1',
]));
```

## Agent 维护模式

```php
use EasySwoole\Consul\Request\Agent\Maintenance;

// 开启维护模式
$consul->agent()->maintenance(new Maintenance([
    'enable' => true,
    'reason' => '计划维护',
]));

// 关闭维护模式；false 不会被序列化器过滤
$consul->agent()->maintenance(new Maintenance([
    'enable' => false,
]));
```

## Catalog 与健康状态

```php
use EasySwoole\Consul\Request\Catalog\Nodes;
use EasySwoole\Consul\Request\Catalog\Service as CatalogService;
use EasySwoole\Consul\Request\Health\Service as HealthService;

$nodes = $consul->catalog()->nodes(new Nodes(['dc' => 'dc1']));

$serviceNodes = $consul->catalog()->service(new CatalogService([
    'service' => 'orders',
    'dc' => 'dc1',
]));

$health = $consul->health()->service(new HealthService([
    'service' => 'orders',
    'passing' => true,
]));
```

服务名、节点名和 KV key 被放入 URL 路径前会进行路径编码。

## Session

```php
use EasySwoole\Consul\Request\Session\Create;
use EasySwoole\Consul\Request\Session\Info;

$created = $consul->sessions()->create(new Create([
    'name' => 'deployment-lock',
    'behavior' => 'delete',
    'TTL' => '30s',
]));

$session = $consul->sessions()->info(new Info([
    'uuid' => $created['ID'],
]));
```

## Snapshot

```php
use EasySwoole\Consul\Request\Snapshot as SnapshotRequest;

$request = new SnapshotRequest(['dc' => 'dc1']);

// 获取快照，返回值可能包含二进制内容
$snapshot = $consul->snapshots()->generate($request);

// 快照以原始请求体发送，不进行 JSON 编码
$restored = $consul->snapshots()->restore(
    new SnapshotRequest(['dc' => 'dc1']),
    $snapshot,
);
```

## ACL Token 和自定义请求头

可以通过 `withHeaders()` 为下一次请求添加请求头：

```php
use EasySwoole\Consul\Request\Catalog\Nodes;

$nodes = $consul->catalog()
    ->withHeaders(['X-Consul-Token' => 'your-token'])
    ->nodes(new Nodes(['dc' => 'dc1']));
```

请求头只作用于紧随其后的一个请求，发送完成后会自动清空，避免 Token 泄漏到后续请求。

部分 ACL 请求对象也提供 Token 字段，端点会按照对应 Consul API 的要求将其转换为 `X-Consul-Token` 请求头。

## 响应与异常

响应处理规则如下：

- JSON 响应会解码为 PHP 数组、标量或 `null`；
- 空响应体返回 `null`；
- 非 JSON 响应保持原始字符串，适用于 Snapshot、Metrics 等接口；
- 网络错误和 HTTP 4xx/5xx 响应会抛出 `ConsulException`；
- HTTP 错误优先使用 `X-Consul-Reason` 响应头作为错误原因，否则使用响应体。

```php
use EasySwoole\Consul\Exception\ConsulException;
use EasySwoole\Consul\Request\Status\Leader;

try {
    $leader = $consul->status()->leader(new Leader());
} catch (ConsulException $exception) {
    echo $exception->getMessage();
}
```

## 替换 HTTP Transport

业务端点不直接依赖具体 HTTP 客户端，而是依赖 `TransportInterface`。这便于测试、接入链路追踪或替换底层请求实现。

```php
use EasySwoole\Consul\ClientConfig;
use EasySwoole\Consul\ConsulClient;
use EasySwoole\Consul\Http\TransportInterface;

final class CustomTransport implements TransportInterface
{
    public function request(
        string $method,
        string $uri,
        ?string $body = null,
        array $headers = [],
    ): mixed {
        // 使用自定义 HTTP 客户端发送请求并返回解码后的结果
        return null;
    }
}

$consul = new ConsulClient(
    new ClientConfig(),
    new CustomTransport(),
);
```

默认实现为 `EasySwooleTransport`，它负责调用 EasySwoole HTTP Client；`ResponseDecoder` 负责统一处理响应和异常。

## 测试

运行全部测试：

```bash
composer test
```

测试分为两层：

1. 单元测试使用 `FakeTransport`，验证序列化、地址生成、参数校验和端点语义；
2. HTTP 集成测试会在随机本地端口启动有状态的 Mock Consul 服务，使用真实 `EasySwooleTransport` 验证完整请求链路。

Mock 集成测试当前覆盖：

- KV 写入、读取、删除及 404；
- Agent 服务注册和查询；
- Session 创建和查询；
- Snapshot 二进制内容恢复和获取；
- Leader 查询；
- Token 请求头、路径编码和查询参数；
- HTTP 403 与 `X-Consul-Reason` 异常转换。

Mock 服务仅监听随机的 `127.0.0.1` 端口，测试结束后会自动关闭，不需要 Docker，也不会访问外网。

## License

Apache-2.0
