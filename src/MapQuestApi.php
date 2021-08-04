<?php
namespace Conversional\MapQuest;

use Conversional\MapQuest\Http\Location;
use GuzzleHttp\Client;
use Conversional\MapQuest\Http\BasicRequest;
use Conversional\MapQuest\Http\MatrixSearch;
use Conversional\MapQuest\Http\Geocode;
use Conversional\MapQuest\Enum\ConfigFields;

// basic request
class MapQuestApi {
    private $base_url = "http://www.mapquestapi.com/";
    private $key = '';

    public function __construct(array $config = []) {
        $key = (empty($config[ConfigFields::KEY])) ? '' : $config[ConfigFields::KEY];
        $this->setKey($key);
    }

    /**
     * @param string $key
     *
     * @return MapQuestApi
     */
    private function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }

    public function apiMatrixSearch(string $origin, array $destinations) {
        $destinations = array_unshift($origin, $destinations);
        $request = new MatrixSearch($destinations);
        return $this->_run($request);
    }

    public function apiGeoCode(string $address)
    {
        $request = Geocode::createGetAddressRequestByLocationString($address);

        return $this->_run($request);
    }

    public function getAddressByLocationString(string $location) : array {
		$request = Geocode::createGetAddressRequestByLocationString($location);

		return json_decode($this->_run($request), 1);
	}

	public function getAddressByLocationObject(Location  $location) : array {
		$request = Geocode::createGetAddressRequestByLocationObject($location);

		return json_decode($this->_run($request), 1);
	}

    protected function _run(BasicRequest $request)
    {
        $client = new Client();
        $query_params = array_merge(['key' => $this->key], $request->getQuery());
        $url = $this->base_url . $request->getEndpoint();
        $response = $client->request($request->getType(), $url, [
            'query' => $query_params,
            'json' => $request->getBody()
        ]);
        return $response->getBody()->getContents();
    }
}