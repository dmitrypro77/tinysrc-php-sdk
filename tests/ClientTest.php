<?php

namespace Tinysrc\Tests;

use Http\Mock\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Tinysrc\Exception\ApiException;
use Tinysrc\Repository\LinkRepository;

class ApiTest extends TestCase
{
    /**
     * @var \Tinysrc\Client
     */
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
        $client = $this->createMock(Client::class);
        $this->client = new \Tinysrc\Client($client, "test");
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->client = null;
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(\Tinysrc\Client::class, $this->client);
        $this->assertInstanceOf(ClientInterface::class, $this->client->getHttpClient());
        $this->assertNotEmpty($this->client->getApiKey());
    }

    public function testEmptyApiKey()
    {
        $clientMock = $this->createMock(Client::class);
        $client = new \Tinysrc\Client($clientMock, '');
        $this->assertInstanceOf(\Tinysrc\Client::class, $client);
        $linkRepository = new LinkRepository($client);
        $this->assertInstanceOf(LinkRepository::class, $linkRepository);
        $this->expectException(ApiException::class);
        $linkRepository->find();
    }
}
