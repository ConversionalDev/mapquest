<?php
namespace Conversional\MapQuest\Http;

class Geocode extends BasicRequest
{
    public function __construct($address)
    {
        $this->setEndpoint('geocoding/v1/address');
        $this->setQuery(array('location' => $address));
        $this->setType('GET');
   }
}