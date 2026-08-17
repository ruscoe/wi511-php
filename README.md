# 511 Wisconsin API PHP Library

An unofficial library for the Wisconsin 511 API.

![release](https://img.shields.io/github/v/release/ruscoe/wi511-php)

## Requirements

* PHP 8.1 or above
* [Composer](https://getcomposer.org)
* A [Wisconsin 511 API key](https://511wi.gov/developers/doc)

## Quick set up

`git clone git@github.com:ruscoe/wi511-php.git`

`cd wi511-php`

`composer install`

## Usage examples

The following examples assume you store your API key in an environment variable.
To do this on a Linux or MacOS system, run:

`export WI511_API_KEY=d605...`

Be sure to substitute your own API key after `WI511_API_KEY=`.

### Cameras

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$api_key = getenv('WI511_API_KEY');

$api = new WI511\WICameras($api_key);

$response = $api->getCameras();

var_dump($response);
```

The response:

```
array(489) {
  [0]=>
  object(stdClass)#35 (12) {
    ["Id"]=>
    int(1)
    ["Source"]=>
    string(4) "ATMS"
    ["SourceId"]=>
    string(1) "1"
    ["Roadway"]=>
    string(10) "I-39/US 51"
    ["Direction"]=>
    string(7) "Unknown"
    ["Latitude"]=>
    float(44.454149)
    ["Longitude"]=>
    float(-89.518702)
    ["Location"]=>
    string(22) "I-39/US 51 at County B"
    ["SortOrder"]=>
    int(0)
    ["Views"]=>
    array(1) {
      [0]=>
      object(stdClass)#33 (5) {
        ["Id"]=>
        int(937)
        ["Url"]=>
        string(30) "https://511wi.gov/map/Cctv/937"
        ["Status"]=>
        string(7) "Enabled"
        ["Description"]=>
        string(0) ""
        ["VideoUrl"]=>
        string(59) "https://cctv1.dot.wi.gov/rtplive/CCTV-49-0011/playlist.m3u8"
      }
    }
    ["Region"]=>
    string(20) "North Central Region"
    ["County"]=>
    string(7) "Portage"
  }
}
```
