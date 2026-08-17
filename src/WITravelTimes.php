<?php

namespace WI511;

/**
 * Wisconsin 511 API travel times library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WITravelTimes extends WIAPI
{
    /**
     * Gets available Wisconsin 511 travel times.
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/traveltimes
     */
    public function getTravelTimes()
    {
        return $this->request('GET', '/get/traveltimes');
    }
}
