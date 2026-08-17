<?php

namespace WI511;

/**
 * Wisconsin 511 API alerts library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WIAlerts extends WIAPI
{
    /**
     * Gets available Wisconsin 511 alerts.
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/alerts
     */
    public function getAlerts()
    {
        return $this->request('GET', '/get/alerts');
    }
}
