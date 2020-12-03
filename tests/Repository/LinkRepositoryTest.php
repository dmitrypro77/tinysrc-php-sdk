<?php

namespace Tinysrc\Tests\Repository;

use Http\Mock\Client;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Exception;
use Tinysrc\Constants;
use Tinysrc\Model\Link;
use Tinysrc\Repository\LinkRepository;
use Tinysrc\ApiResponse;
use Tinysrc\Response\LinkItemDetailedResponse;
use Tinysrc\Response\LinkItemResponse;
use Tinysrc\Response\LinkResponse;

class LinkRepositoryTest extends TestCase
{
    /**
     * @var \Tinysrc\Client
     */
    protected $client;

    /**
     * @var LinkRepository
     */
    protected $linkRepository;

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
        $this->linkRepository = new LinkRepository($this->client);
    }

    protected function tearDown():void
    {
        parent::tearDown();
        $this->client = null;
        $this->serializer = null;
    }

    public function testAdd()
    {
        $link = new Link();
        $link->setUrl("http://test.com");

        try {
            $this->linkRepository->add($link);
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $linkResponse = new LinkItemResponse();
        $linkResponse->setUrl("https://test.com/go/12354")
            ->setStatUrl("https://test.com/stat/12354")
            ->setAuthRequired(false);

        $mockResponse = new \Nyholm\Psr7\Response(200, [], $this->serializer->serialize($linkResponse, "json", SerializationContext::create()->setVersion(Constants::CURRENT_VERSION)));

        $response = new ApiResponse($mockResponse, LinkItemResponse::class);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertInstanceOf(LinkItemResponse::class, $response->getData());
        $this->assertTrue($response->isSuccess());
        $this->assertFalse($response->hasErrors());
        $this->assertCount(0, $response->getValidations());
        $this->assertNotEmpty($response->getData());
        $this->assertEquals("https://test.com/go/12354", $response->getData()->getUrl());
    }

    public function testAddValidationError()
    {
        $link = new Link();
        $link->setUrl("wrong url");

        try {
            $this->linkRepository->add($link);
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $mockResponse = new \Nyholm\Psr7\Response(
            422,
            [],
            '{"validations":{"url":["URL is not valid"]},"errors":["Validation Error Happened"]}'
        );

        $response = new ApiResponse($mockResponse, LinkItemResponse::class);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertNotInstanceOf(LinkItemResponse::class, $response->getData());
        $this->assertFalse($response->isSuccess());
        $this->assertEquals(422, $response->getStatus());
        $this->assertTrue($response->hasErrors());
        $this->assertCount(1, $response->getValidations());
        $this->assertEmpty($response->getData());
    }

    public function testFind()
    {
        try {
            $this->linkRepository->find();
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $data = [];
        for ($i=0; $i < 10; $i++) {
            $data['data'][] = [
                "url" => "http://test.com",
                "hash" => "123",
                "auth_required" => false,
                "stat_password" => "123",
                "qr_code" => "123",
                "active" => true,
            ];
        }

        $data['total'] = count($data['data']);

        $mockResponse = new \Nyholm\Psr7\Response(
            200,
            [],
            json_encode($data)
        );

        $response = new ApiResponse($mockResponse, LinkResponse::class);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertInstanceOf(LinkResponse::class, $response->getData());
        $this->assertTrue($response->isSuccess());
        $this->assertEquals(200, $response->getStatus());
        $this->assertFalse($response->hasErrors());
        $this->assertEquals($data['total'], count($response->getData()->getData()));
        $this->assertNotEmpty($response->getData());
    }

    public function testFindByHash()
    {
        try {
            $this->linkRepository->findByHash(md5(2));
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $data = [];
        for ($i=0; $i < 10; $i++) {
            $data[] = [
                "url" => "http://test.com",
                "hash" => md5($i),
                "auth_required" => false,
                "stat_password" => "123",
                "qr_code" => "123",
                "active" => true,
            ];
        }

        $mockResponse = new \Nyholm\Psr7\Response(
            200,
            [],
            json_encode($data[2])
        );

        $response = new ApiResponse($mockResponse, LinkItemDetailedResponse::class);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue($response->isSuccess());
        $this->assertEquals(200, $response->getStatus());
        $this->assertFalse($response->hasErrors());
        $this->assertNotEmpty($response->getData());
        $this->assertEquals($data[2]['url'], $response->getData()->getUrl());
    }

    public function testActivate()
    {
        try {
            $this->linkRepository->activate(md5(2));
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $mockResponse = new \Nyholm\Psr7\Response(
            200,
            []
        );

        $response = new ApiResponse($mockResponse);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue($response->isSuccess());
        $this->assertEquals(200, $response->getStatus());
        $this->assertFalse($response->hasErrors());
    }

    public function testDeactivate()
    {
        try {
            $this->linkRepository->deactivate(md5(2));
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $mockResponse = new \Nyholm\Psr7\Response(
            200,
            []
        );

        $response = new ApiResponse($mockResponse);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue($response->isSuccess());
        $this->assertEquals(200, $response->getStatus());
        $this->assertFalse($response->hasErrors());
    }
}
