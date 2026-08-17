<?php

namespace WI511;

/**
 * Wisconsin 511 API cameras library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WICameras extends WIAPI
{
    /**
     * Gets available Wisconsin 511 cameras.
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/cameras
     */
    public function getCameras()
    {
        return $this->request('GET', '/get/cameras');
    }
}
