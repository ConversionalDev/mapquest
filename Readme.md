# MapQuest PHP API

# Purpose
Package currently only implements the RouteMatrix endpoint of the API.

# Usage

## Setup
```
use /MapQuest/MapQuestApi

$key = 'your_mapquest_key';
$config = array('key' => $key);
$client = new MapQuestApi($config);
```

## Matrix Request
```
$response = $client->apiMatrixRoute($locations);
```