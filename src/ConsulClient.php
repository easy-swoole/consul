<?php
declare(strict_types=1);

namespace EasySwoole\Consul;

use EasySwoole\Consul\Http\EasySwooleTransport;
use EasySwoole\Consul\Http\TransportInterface;
use EasySwoole\Consul\Request\RequestSerializer;

final class ConsulClient
{
    private readonly ClientConfig $config;
    private readonly TransportInterface $transport;
    private readonly RequestSerializer $serializer;

    private ?KVStore $kv = null;
    private ?Health $health = null;
    private ?Catalog $catalog = null;
    private ?Agent $agent = null;
    private ?Acl $acl = null;
    private ?ConsulConfig $configuration = null;
    private ?Connect $connect = null;
    private ?Coordinates $coordinates = null;
    private ?Event $events = null;
    private ?Query $queries = null;
    private ?Session $sessions = null;
    private ?Snapshot $snapshots = null;
    private ?Status $status = null;
    private ?Transaction $transactions = null;
    private ?Operator $operator = null;

    public function __construct(
        ?ClientConfig $config = null,
        ?TransportInterface $transport = null,
        ?RequestSerializer $serializer = null
    ) {
        $this->config = $config ?? new ClientConfig();
        $this->transport = $transport ?? new EasySwooleTransport($this->config->tls);
        $this->serializer = $serializer ?? new RequestSerializer();
    }

    public function kv(): KVStore
    {
        // 端点按需创建并复用，同时共享同一套配置、Transport 和序列化规则。
        return $this->kv ??= $this->endpoint(KVStore::class);
    }

    public function health(): Health
    {
        return $this->health ??= $this->endpoint(Health::class);
    }

    public function catalog(): Catalog
    {
        return $this->catalog ??= $this->endpoint(Catalog::class);
    }

    public function agent(): Agent
    {
        return $this->agent ??= $this->endpoint(Agent::class);
    }

    public function acl(): Acl
    {
        return $this->acl ??= $this->endpoint(Acl::class);
    }

    public function configuration(): ConsulConfig
    {
        return $this->configuration ??= $this->endpoint(ConsulConfig::class);
    }

    public function connect(): Connect
    {
        return $this->connect ??= $this->endpoint(Connect::class);
    }

    public function coordinates(): Coordinates
    {
        return $this->coordinates ??= $this->endpoint(Coordinates::class);
    }

    public function events(): Event
    {
        return $this->events ??= $this->endpoint(Event::class);
    }

    public function queries(): Query
    {
        return $this->queries ??= $this->endpoint(Query::class);
    }

    public function sessions(): Session
    {
        return $this->sessions ??= $this->endpoint(Session::class);
    }

    public function snapshots(): Snapshot
    {
        return $this->snapshots ??= $this->endpoint(Snapshot::class);
    }

    public function status(): Status
    {
        return $this->status ??= $this->endpoint(Status::class);
    }

    public function transactions(): Transaction
    {
        return $this->transactions ??= $this->endpoint(Transaction::class);
    }

    public function operator(): Operator
    {
        return $this->operator ??= $this->endpoint(Operator::class);
    }

    /** @template T of AbstractEndpoint
     *  @param class-string<T> $endpoint
     *  @return T
     */
    private function endpoint(string $endpoint): AbstractEndpoint
    {
        // 统一构造入口确保所有端点都可通过注入 FakeTransport 进行无网络单元测试。
        return new $endpoint($this->config, $this->transport, $this->serializer);
    }
}
