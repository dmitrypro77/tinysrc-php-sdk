<?php

namespace Tinysrc\Tests\Repository;

use Http\Mock\Client;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Exception;
use Tinysrc\Constants;
use Tinysrc\Repository\StatRepository;
use Tinysrc\ApiResponse;
use Tinysrc\Response\StatItemResponse;
use Tinysrc\Response\StatResponse;

class StatRepositoryTest extends TestCase
{
    /**
     * @var \Tinysrc\Client
     */
    protected $client;

    /**
     * @var StatRepository
     */
    protected $statRepository;

    /**
     * @var SerializerBuilder
     */
    protected $serializer;

    protected function setUp():void
    {
        parent::setUp();
        $this->serializer = SerializerBuilder::create()->build();
        $client = $this->createMock(Client::class);
        $this->client = new \Tinysrc\Client($client, "test");
        $this->statRepository = new StatRepository($this->client);
    }

    protected function tearDown():void
    {
        parent::tearDown();
        $this->client = null;
        $this->serializer = null;
    }

    public function testFindByHash()
    {
        $serializer = SerializerBuilder::create()->build();

        try {
            $this->statRepository->findByHash(md5("test"));
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $stat = new StatResponse();
        $statItem = new StatItemResponse();
        $statItem->setBot(false)
            ->setBrowser("Chrome")
            ->setBrowserVersion("1.0")
            ->setIp("8.8.8.8")
            ->setOs("Linux")
            ->setReferer("test.com");
        $stat->setData([$statItem]);
        $stat->setTotal(1);

        $mockResponse = new \Nyholm\Psr7\Response(200, [], $serializer->serialize($stat, 'json', SerializationContext::create()->setVersion(Constants::CURRENT_VERSION)));

        $response = new ApiResponse($mockResponse, StatResponse::class);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertInstanceOf(StatResponse::class, $response->getData());
        $this->assertTrue($response->isSuccess());
        $this->assertFalse($response->hasErrors());
        $this->assertEquals($stat, $response->getData());
    }
}
