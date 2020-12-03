<?php

namespace Tinysrc\Exception;

use Exception;
use Tinysrc\Constants;

/**
 * Represents an error returned from the API.
 */
class ApiException extends Exception
{
    public function __construct($message, $code = Constants::ERROR_API_CODE, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
