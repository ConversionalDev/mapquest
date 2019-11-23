<?php
namespace Conversional\MapQuest\Http;

class MatrixSearch extends BasicRequest
{
    public function __construct(array $destinations, array $options = array())
    {
        $this->setEndpoint('routematrix');
        $this->setType('GET');
        $this->setDefaultOptions(array("manyToOne" => true));

        $body = array(
            'locations' => $destinations,
            'options' => array_merge($this->getDefaultOptions(), $options)
        );
        $this->_setBody($body);
    }
}