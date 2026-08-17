<?php

namespace WI511;

/**
 * Wisconsin 511 API winter road conditions library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WIWinterRoads extends WIAPI
{
    /**
     * Gets available Wisconsin 511 winter road conditions.
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/winterroads
     */
    public function getWinterRoads()
    {
        return $this->request('GET', '/get/winterroads');
    }
}
