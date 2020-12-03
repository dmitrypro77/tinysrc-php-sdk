<?php

namespace Tinysrc\Repository;

use JMS\Serializer\SerializerBuilder;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Uri;
use Psr\Http\Client\ClientExceptionInterface;
use Tinysrc\Client;
use Tinysrc\Exception\ApiException;
use Tinysrc\Exception\ConfigurationException;
use Tinysrc\ApiResponse;

class AbstractRepository
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var \JMS\Serializer\Serializer
     */
    protected $serializer;

    /**
     * AbstractRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->serializer = SerializerBuilder::create()->build();
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param string $url
     * @param string $jsonData
     * @param string $className
     * @return ApiResponse
     * @throws ConfigurationException
     * @throws \Exception
     */
    protected function request(string $method, string $url, string $jsonData = '', string $className = ''): ApiResponse
    {
        $url = Client::BASE_URL . '/' . Client::VERSION . $url;
        $uri = new Uri($url);

        if (empty($this->client->getApiKey())) {
            throw new ConfigurationException('Api token is required');
        }

        try {
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'x-api-key' => $this->client->getApiKey(),
            ];

            $request = new Request($method, $uri, $headers, $jsonData);
            $response = $this->client->getHttpClient()->sendRequest($request);
            return new ApiResponse($response, $className);
        } catch (ClientExceptionInterface $e) {
            throw new ApiException($e->getMessage(), (int) $e->getCode());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), (int) $e->getCode());
        }
    }
}
