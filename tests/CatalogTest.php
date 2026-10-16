<?php
namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\Catalog;
use EasySwoole\Consul\ClientConfig;
use EasySwoole\Consul\Request\BaseCommand;
use EasySwoole\Consul\Request\Catalog\Connect;
use EasySwoole\Consul\Request\Catalog\Node;
use EasySwoole\Consul\Request\Catalog\Service;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CatalogTest extends TestCase
{
    public static function routeProvider(): iterable
    {
        yield 'service' => ['service', new Service(['service' => 'web api']), 'catalog/service/web%20api'];
        yield 'connect' => ['connect', new Connect(['service' => 'web api']), 'catalog/connect/web%20api'];
        yield 'node' => ['node', new Node(['node' => 'node/one']), 'catalog/node/node%2Fone'];
    }

    #[DataProvider('routeProvider')]
    public function testPathParametersUsePublicApiAndAreEncoded(
        string $method,
        BaseCommand $request,
        string $expectedUrl
    ): void {
        $transport = new FakeTransport();
        $catalog = new Catalog(new ClientConfig(), $transport);

        $catalog->{$method}($request);

        self::assertSame('http://127.0.0.1:8500/v1/' . $expectedUrl, $transport->lastRequest()['uri']);
    }
}
