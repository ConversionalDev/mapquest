<?php
namespace Conversional\MapQuest\Http;

class Geocode extends BasicRequest
{
	private function __construct() {
	}

	public static function createGetAddressRequestByLocationString(string $location) : self {
   	   $self = new self();
	   $self->setEndpoint('geocoding/v1/address');
	   $self->setQuery(array('location' => $location));
	   $self->setType('GET');

	   return $self;
   }

   public static function createGetAddressRequestByLocationObject(Location $location) : self {
	   $self = new self();
	   $self->setEndpoint('geocoding/v1/address');
	   $self->setQuery($location->jsonSerialize());
	   $self->setType('GET');

	   return $self;
   }
}