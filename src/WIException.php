<?php

namespace WI511;

use Exception;

/**
 * Wisconsin 511 API exception.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WIException extends Exception
{
    /**
     * @inheritdoc
     */
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {

        // TODO: Custom exception handling here.
        parent::__construct($message, $code, $previous);
    }

}
