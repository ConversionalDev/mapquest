<?php
namespace Conversional\MapQuest\Http;

abstract class BasicRequest {
    private $endpoint = '';
    private $type = 'GET';
    private $query = array();
    private $body = null;
    private $options = null;

    public function getType() {
        return $this->type;
    }

    public function getQuery() {
        return $this->query;
    }

    public function getEndpoint() {
        return $this->endpoint;
    }

    protected function setEndpoint(string $endpoint) {
        $this->endpoint = $endpoint;
    }

    protected function setDefaultOptions(array $options) {
        $this->options = $options;
    }

    public function getDefaultOptions() {
        return $this->options;
    }

    protected function setType(string $type) {
        $this->type = $type;
    }

    protected function setQuery(array $queryParameters) {
        $this->query = $queryParameters;
    }

    public function getBody() {
        return $this->body;
    }

    protected function _setBody($data) {
        $this->body = $data;
    }
}