<?php
namespace MapQuest\http;

class BasicRequest {
    private $endpoint = '';
    private $type = 'GET';
    private $query = array();
    private $body = null;

    public function getType() {
        return $this->type;
    }

    public function getQuery() {
        return $this->query;
    }

    public function getEndpoint() {
        return $this->endpoint;
    }

    public function getBody() {
        return $this->body;
    }

    protected function _setBody($data) {
        $this->body = $data;
    }
}