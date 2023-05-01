<?php

namespace App\Core;
use App\Contracts\IHttpClient;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GuzzleHttpClient implements IHttpClient
{

    private Client $_client;


    function __construct(Client $client) {
        $this->_client = $client;
    }

    function httpGet(string $url): ResponseInterface {
        $response = $this->_client->request('GET', $url);
        return $response;
    }


}
