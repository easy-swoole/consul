<?php
namespace EasySwoole\Consul\Tests;

use EasySwoole\Consul\ClientConfig;
use EasySwoole\Consul\Exception\MissingRequiredParameterException;
use EasySwoole\Consul\Operator;
use EasySwoole\Consul\Request\Operator\Raft\Peer;
use PHPUnit\Framework\TestCase;

final class OperatorTest extends TestCase
{
    public function testPeerRequiresIdOrAddress(): void
    {
        $this->expectException(MissingRequiredParameterException::class);

        (new Operator(new ClientConfig(), new FakeTransport()))->peer(new Peer());
    }

    public function testPeerAcceptsId(): void
    {
        $transport = new FakeTransport();
        $operator = new Operator(new ClientConfig(), $transport);
        $peer = new Peer(['id' => 'raft-id']);

        $operator->peer($peer);

        self::assertSame('DELETE', $transport->lastRequest()['method']);
        self::assertSame('id=raft-id', parse_url($transport->lastRequest()['uri'], PHP_URL_QUERY));
    }
}
