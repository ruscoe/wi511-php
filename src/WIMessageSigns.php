<?php

namespace WI511;

/**
 * Wisconsin 511 API message signs library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WIMessageSigns extends WIAPI
{
    /**
     * Gets available Wisconsin 511 message signs.
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/messagesigns
     */
    public function getMessageSigns()
    {
        return $this->request('GET', '/get/messagesigns');
    }
}
