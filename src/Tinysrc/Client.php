<?php

namespace Tinysrc;

use Psr\Http\Client\ClientInterface;

class Client
{
    public const BASE_URL = 'https://tinysrc.me/api';
    public const VERSION = 'v1';

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * Api Key From TinySRC.
     *
     * @var string
     */
    private $apiKey;

    /**
     * Client constructor.
     *
     * @param ClientInterface $httpClient
     * @param $apiKey
     */
    public function __construct(ClientInterface $httpClient, $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}
