<?php

namespace MapQuest\Http;

class MatrixSearch extends BasicRequest
{
    private $endpoint = 'matrixroute';
    private $type = 'GET';
    private $defaultOptions = array("manyToOne" => true);

    public function __construct(array $destinations, array $options = array())
    {
        $body = array(
            'locations' => $destinations,
            'options' => array_merge($this->defaultOptions, $options)
        );
        $this->_setBody($body);
    }
}