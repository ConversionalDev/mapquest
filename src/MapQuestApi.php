<?php
//namespace MapQuest;

use GuzzleHttp\Client;
use MapQuest\http\BasicRequest;
use MapQuest\http\MatrixSearch;
use MapQuest\Enum\ConfigFields;

// basic request
class MapQuestApi {
    private $base_url = "http://www.mapquestapi.com/directions/v2/";
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


    protected function _run(BasicRequest $request)
    {
        $client = new Client();
        $query_params = array_merge(['key' => $this->key], $request->getQuery());
        $url = $this->base_url . $request->getEndpoint();
        $response = $client->request($request->getType(), $url, [
            'query' => $query_params,
            'json' => $request->getBody()
        ]);
        return $response->getBody();
    }

}