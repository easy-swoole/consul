<?php
namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\Request\Query;
use PHPUnit\Framework\TestCase;

final class BaseCommandTest extends TestCase
{
    public function testSplTwoFieldMappingPreservesNestedValues(): void
    {
        $request = new Query();
        $request->setName('orders');
        $request->setService([
            'Service' => 'api',
            'OnlyPassing' => false,
        ]);
        $request->setDNS(['TTL' => '10s']);

        $data = $request->toArrayWithMapping();

        self::assertSame('orders', $data['Name']);
        self::assertSame(['Service' => 'api', 'OnlyPassing' => false], $data['Service']);
        self::assertSame(['TTL' => '10s'], $data['DNS']);
        self::assertArrayNotHasKey('name', $data);
        self::assertArrayNotHasKey('service', $data);
    }
}
