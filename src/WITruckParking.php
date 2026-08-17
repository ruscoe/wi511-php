<?php

namespace WI511;

/**
 * Wisconsin 511 API truck parking library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WITruckParking extends WIAPI
{
    /**
     * Gets available Wisconsin 511 truck parking.
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/truckparking
     */
    public function getTruckParking()
    {
        return $this->request('GET', '/get/truckparking');
    }
}
