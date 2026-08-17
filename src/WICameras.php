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

    /**
     * Gets a specific camera.
     *
     * @param int $id the camera ID
     *
     * @return object
     *
     * @see https://511wi.gov/help/endpoint/cameras
     */
    public function getCamera($id)
    {
        $cameras = $this->request('GET', '/get/cameras');

        $total_cameras = count($cameras);
        for ($i = 0; $i < $total_cameras; $i++) {
            if ($cameras[$i]->Id == $id) {
                return $cameras[$i];
            }
        }

        return null;
    }
}
