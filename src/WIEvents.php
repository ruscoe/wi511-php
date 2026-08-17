<?php

namespace WI511;

/**
 * Wisconsin 511 API traffic events library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WIEvents extends WIAPI
{
    /**
     * Gets available Wisconsin 511 traffic events.
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/event
     */
    public function getEvents()
    {
        return $this->request('GET', '/get/event');
    }
}
