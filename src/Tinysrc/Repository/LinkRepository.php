<?php

namespace Tinysrc\Repository;

use JMS\Serializer\SerializationContext;
use Tinysrc\Constants;
use Tinysrc\Exception\ApiException;
use Tinysrc\Model\Link;
use Tinysrc\ApiResponse;
use Tinysrc\Response\LinkItemDetailedResponse;
use Tinysrc\Response\LinkItemResponse;
use Tinysrc\Response\LinkResponse;

class LinkRepository extends AbstractRepository
{
    /**
     * @param Link $link
     * @return ApiResponse
     * @throws \Exception
     */
    public function add(Link $link)
    {
        try {
            $jsonContent = $this->serializer->serialize($link, 'json', SerializationContext::create()->setVersion(Constants::CURRENT_VERSION));

            return $this->request("POST", "/create", $jsonContent, LinkItemResponse::class);
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    /**
     * @param int $limit
     * @param int $page
     * @param string $query
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function find($limit = 10, $page = 1, $query = '')
    {
        try {
            $queryParams = http_build_query([
                'limit' => $limit,
                'page' => $page,
                'query' => $query,
            ]);

            return $this->request(
                "GET",
                "/client/url" . (!empty($queryParams) ? '?' . $queryParams : ''),
                '',
                LinkResponse::class
            );
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    /**
     * @param string $hash
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function findByHash(string $hash)
    {
        try {
            return $this->request("GET", "/client/url/" . $hash, '', LinkItemDetailedResponse::class);
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    /**
     * @param string $hash
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function activate(string $hash)
    {
        try {
            return $this->request("PATCH", "/client/" . $hash, json_encode([
                'active' => true
            ]));
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    /**
     * @param string $hash
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function deactivate(string $hash)
    {
        try {
            return $this->request("PATCH", "/client/" . $hash, json_encode([
                'active' => false
            ]));
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }
}
