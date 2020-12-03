<?php

namespace Tinysrc\Exception;

use Exception;
use Tinysrc\Constants;

/**
 * Represents an error returned from the API.
 */
class ConfigurationException extends Exception
{
    public function __construct($message, $code = Constants::ERROR_CONFIGURATION_CODE, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
