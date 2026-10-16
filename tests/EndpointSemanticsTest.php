<?php
namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\Agent;
use EasySwoole\Consul\ClientConfig;
use EasySwoole\Consul\KVStore;
use EasySwoole\Consul\Request\Agent\Maintenance;
use EasySwoole\Consul\Request\Kv;
use EasySwoole\Consul\Request\Snapshot as SnapshotRequest;
use EasySwoole\Consul\Snapshot;
use PHPUnit\Framework\TestCase;

final class EndpointSemanticsTest extends TestCase
{
    public function testKvPutUsesRawBodyAndQueryOptions(): void
    {
        $transport = new FakeTransport(true);
        $store = new KVStore(new ClientConfig(), $transport);

        $result = $store->put(new Kv(['key' => 'folder/a b', 'cas' => 42]), 'raw-value');
        $request = $transport->lastRequest();

        self::assertTrue($result);
        self::assertSame('PUT', $request['method']);
        self::assertSame('raw-value', $request['body']);
        self::assertSame('/v1/kv/folder%2Fa%20b', parse_url($request['uri'], PHP_URL_PATH));
        self::assertSame('cas=42', parse_url($request['uri'], PHP_URL_QUERY));
    }

    public function testNodeMaintenanceCanBeDisabled(): void
    {
        $transport = new FakeTransport();
        $agent = new Agent(new ClientConfig(), $transport);

        $agent->maintenance(new Maintenance(['enable' => false]));

        self::assertSame('enable=0', parse_url($transport->lastRequest()['uri'], PHP_URL_QUERY));
    }

    public function testSnapshotRestoreUsesRawSnapshotBody(): void
    {
        $transport = new FakeTransport();
        $snapshots = new Snapshot(new ClientConfig(), $transport);

        $snapshots->restore(new SnapshotRequest(['dc' => 'dc1']), 'binary-snapshot');

        self::assertSame('binary-snapshot', $transport->lastRequest()['body']);
        self::assertSame('dc=dc1', parse_url($transport->lastRequest()['uri'], PHP_URL_QUERY));
    }
}
