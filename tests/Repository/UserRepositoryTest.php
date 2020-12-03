<?php

namespace Tinysrc\Tests\Repository;

use Http\Mock\Client;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Exception;
use Tinysrc\Constants;
use Tinysrc\Repository\UserRepository;
use Tinysrc\ApiResponse;
use Tinysrc\Response\UserResponse;

class UserRepositoryTest extends TestCase
{
    /**
     * @var \Tinysrc\Client
     */
    protected $client;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    protected function setUp():void
    {
        parent::setUp();
        $client = $this->createMock(Client::class);
        $this->client = new \Tinysrc\Client($client, "test");
        $this->userRepository = new UserRepository($this->client);
    }

    protected function tearDown():void
    {
        parent::tearDown();
        $this->client = null;
    }

    public function testCurrent()
    {
        $serializer = SerializerBuilder::create()->build();

        try {
            $this->userRepository->current();
        } catch (\Exception $e) {
            throw new Exception($e);
        }

        $user = new UserResponse();
        $user->setActive(true)
            ->setApiKey("test")
            ->setBanned(false)
            ->setPlan(1)
            ->setUsername("test");

        $mockResponse = new \Nyholm\Psr7\Response(200, [], $serializer->serialize($user, 'json', SerializationContext::create()->setVersion(Constants::CURRENT_VERSION)));

        $response = new ApiResponse($mockResponse, UserResponse::class);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertInstanceOf(UserResponse::class, $response->getData());
        $this->assertTrue($response->isSuccess());
        $this->assertFalse($response->hasErrors());
        $this->assertEquals($user, $response->getData());
    }
}
