<?php

namespace RDStation;

use Zend\Http\Client;
use Zend\Http\Request;

class RDStation
{
    const API_URL = 'http://www.rdstation.com.br/api/1.2';

    /**
     * @var $options array
     */
    protected $options;

    /**
     * @param array $options
     */
    public function __construct(Array $options)
    {
        $this->setOptions($options);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        if (!array_key_exists('token_rdstation', $options)) {
            throw new \InvalidArgumentException('Option token not found');
        }

        if (!array_key_exists('identificador', $options)) {
            throw new \InvalidArgumentException('Option identifier not found');
        }

        $this->options = $options;
        return $this;
    }

    public function execute($uri, $method, Array $data = [], Array $headers = [])
    {
        $data = array_merge($this->options, $data);

        $client = $this->getClient();
        $client->setHeaders($headers);
        $client->setMethod($method);
        $client->setUri(self::API_URL.$uri);

        switch ($method) {
            case Request::METHOD_POST:
                $client->setParameterPost($data);
                break;
            case Request::METHOD_PUT:
                $client->setParameterPost($data);
                break;
            case Request::METHOD_GET:
                $client->setParameterGet($data);
                break;
        }

        $response = $client->send();

        return $response->getBody();
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        $client = new Client();
        $client->setAdapter(new Client\Adapter\Curl());

        return $client;
    }
}
