<?php

namespace Tinysrc\Repository;

use Tinysrc\Exception\ApiException;
use Tinysrc\ApiResponse;
use Tinysrc\Response\StatResponse;

class StatRepository extends AbstractRepository
{
    /**
     * @param string $hash
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function findByHash(string $hash)
    {
        try {
            return $this->request("GET", "/client/stat/" . $hash, '', StatResponse::class);
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }
}
