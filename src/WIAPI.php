<?php

namespace WI511;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use WI511\WIException;

/**
 * Wisconsin 511 API library.
 *
 * @package WI511
 * @author  Dan Ruscoe <danruscoe@protonmail.com>
 * @license MIT https://mit-license.org/
 * @link    https://github.com/ruscoe/wi511-php
 */
class WIAPI
{
    /**
     * The API endpoint.
     */
    protected $endpoint = 'https://511wi.gov/api/v2';

    /**
     * The API key to use.
     */
    protected $api_key;

    /**
     * The HTTP client.
     */
    protected $client;

    /**
     * WI511 library constructor.
     *
     * @param string $api_key the API key to use
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;

        $this->client = new Client();
    }

    /**
     * Makes a request to the Wisconsin 511 API.
     *
     * @param string $method     the method to use when making the request
     *                           GET, POST or multipart
     * @param string $path       the API path to request
     * @param array  $parameters parameters to send with the request
     * @param array  $options    HTTP request options to send to Guzzle
     *
     * @return mixed
     *
     * @throws WIException
     */
    public function request($method, $path, $parameters = [], $options = [])
    {
        // Set up user agent.
        $headers = [
            'User-Agent' => 'PHP library for the Wisconsin 511 API (https://github.com/ruscoe/wi511-php)',
        ];

        $options['headers'] = $headers;

        // Add API key.
        $parameters['key'] = $this->api_key;

        if ($method == 'POST') {
            // POST parameters are included in the request body as JSON.
            $options['json'] = (object) $parameters;
        } elseif ($method == 'multipart') {
            $options['multipart'] = $parameters;
        } else {
            // Request parameters are included in the query string for other methods.
            $options['query'] = $parameters;
        }

        try {
            $url = $this->endpoint.$path;
            $response = $this->client->request(($method == 'multipart') ? 'POST' : $method, $url, $options);

            if (isset($options['stream'])) {
                return $response->getBody()->getContents();
            } else {
                return json_decode($response->getBody());
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody());
                throw new WIException($body->error->message, $response->getStatusCode(), $e);
            } else {
                throw new WIException($e->getMessage(), $e->getCode(), $e);
            }
        }
    }
}
