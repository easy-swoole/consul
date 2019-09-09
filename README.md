# consul

#### 构造请求参数
各参数的除固定用法，例如TTL，HTTP等以外，
其他参数首字母都是小写（通过对象set/get的方式不需要遵循该原则）。

#### 使用方式
```php
// config默认  127.0.0.1:8500/v1
$config = new Config([
    'IP'       => '127.0.0.1',
    'port'     => '8500',
    'version'  => 'v1',
]);
$consul = new Consul($config);

$node = new Node([
    'node' => '44e4656a94cd',
    'dc' => 'a',
    'filter' => 'b',
]);
$consul->catalog()->node($node);

// 两种写法，结果相同
$config = new Config();
$config->setIP('127.0.0.1');
$config->setPort('8500');
$config->setVersion('v1');    

$consul = new Consul($config);

$node = new Node([
    'node' => '44e4656a94cd',
    'dc' => 'a',
    'filter' => 'b',
]);
$consul->catalog()->node($node);
```