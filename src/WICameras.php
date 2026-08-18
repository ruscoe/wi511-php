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

    /**
     * Gets available cameras by region.
     *
     * @param string $region the camera region
     *
     * @return array
     *
     * @see https://511wi.gov/help/endpoint/cameras
     */
    public function getCamerasByRegion($region)
    {
        $cameras = $this->request('GET', '/get/cameras');

        $region_cameras = [];

        $total_cameras = count($cameras);
        for ($i = 0; $i < $total_cameras; $i++) {
            if ($cameras[$i]->Region == $region) {
                $region_cameras[] = $cameras[$i];
            }
        }

        return $region_cameras;
    }

    /**
     * Gets available cameras by county.
     *
     * @param string $county the camera county
     *
     * @return array
     *
     * @see https://511wi.gov/help/endpoint/cameras
     */
    public function getCamerasByCounty($county)
    {
        $cameras = $this->request('GET', '/get/cameras');

        $county_cameras = [];

        $total_cameras = count($cameras);
        for ($i = 0; $i < $total_cameras; $i++) {
            if ($cameras[$i]->County == $county) {
                $county_cameras[] = $cameras[$i];
            }
        }

        return $county_cameras;
    }

    /**
     * Saves a camera image.
     *
     * @param int    $id     the camera ID
     * @param string $output the file to write the image to
     *
     * @return bool true if camera image is saved
     *
     * @see https://511wi.gov/help/endpoint/cameras
     */
    public function saveCameraImage($id, $output)
    {
        $camera = $this->getCamera($id);

        if ($camera !== null) {
            $url = $camera->Views[0]->Url;

            $ch = curl_init($url);

            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_USERAGENT => 'PHP library for the Wisconsin 511 API (https://github.com/ruscoe/wi511-php)',
            ]);

            $image = curl_exec($ch);

            curl_close($ch);

            return (file_put_contents($output, $image) !== false);
        }

        return false;
    }
}
