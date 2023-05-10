<?php

namespace Conversional\MapQuest\Http;

class Geocode extends BasicRequest
{
    private function __construct()
    {
    }

    public static function createGetAddressRequestByLocationString(string $location): self
    {
        $self = new self();
        $self->setEndpoint('geocoding/v1/address');
        $self->setQuery(['location' => $location]);
        $self->setType('GET');

        return $self;
    }

   public static function createGetAddressRequestByLocationObject(Location $location): self
   {
       $self = new self();
       $self->setEndpoint('geocoding/v1/address');
       $self->setQuery($location->jsonSerialize());
       $self->setType('GET');

       return $self;
   }

   public static function createGetAddressRequestByGeoPointObject($lat, $lng): self
   {
       $self = new self();
       $self->setEndpoint('geocoding/v1/address');
       $self->setQuery([
           'includeRoadMetadata' => true,
           'includeNearestIntersection' => true,
           'location' => $lat . ',' . $lng,
       ]);
       $self->setType('GET');

       return $self;
   }
}
