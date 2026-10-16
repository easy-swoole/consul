<?php
namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\Connect;
use EasySwoole\Consul\ConsulInterface\ConnectInterface;
use EasySwoole\Consul\Request\Agent\Maintenance;
use EasySwoole\Consul\Request\Catalog\Service;
use EasySwoole\Consul\Request\Connect\Intentions\IntentionMatch;
use EasySwoole\Consul\Request\Snapshot;
use PHPUnit\Framework\TestCase;

final class CompatibilityTest extends TestCase
{
    public function testPhpEightCompatibleIntentionMatchTypeExists(): void
    {
        self::assertTrue(class_exists(IntentionMatch::class));
        self::assertTrue(is_a(Connect::class, ConnectInterface::class, true));
    }

    public function testBooleanSettersAcceptFalse(): void
    {
        $maintenance = new Maintenance();
        $maintenance->setEnable(false);
        $snapshot = new Snapshot();
        $snapshot->setStale(false);

        self::assertFalse($maintenance->getEnable());
        self::assertFalse($snapshot->getStale());
    }

    public function testCorrectlySpelledNodeMetaSetterIsAvailable(): void
    {
        $service = new Service();
        $service->setNodeMeta('region:east');

        self::assertSame('region:east', $service->getNodeMeta());
    }
}
