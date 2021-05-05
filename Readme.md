# MapQuest PHP API

# Purpose
Package currently only implements the RouteMatrix endpoint of the API.

# Usage

## Setup
```
use Conversional\MapQuest\MapQuestApi;

$key = 'your_mapquest_key';
$config = ['key' => $key];
$client = new MapQuestApi($config);
```

## Matrix Request
```
$origin = 'KW1 4YX';
$destinations = ['LE15 6US'];
$response = $client->apiMatrixSearch($origin, $destinations);
```

## Matrix Request
```
$response = $client->apiGeoCode($address);
```
