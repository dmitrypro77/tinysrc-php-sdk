<?php

namespace Tinysrc\Repository;

use Tinysrc\Exception\ApiException;
use Tinysrc\ApiResponse;
use Tinysrc\Response\UserResponse;

class UserRepository extends AbstractRepository
{
    /**
     * @return ApiResponse
     * @throws ApiException
     */
    public function current()
    {
        try {
            return $this->request("GET", "/client/user", '', UserResponse::class);
        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }
}
