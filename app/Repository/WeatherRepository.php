<?php

namespace App\Repository;
use App\Contracts\IHttpClient;
use App\Contracts\IWeatherRepository;

class WeatherRepository implements IWeatherRepository
{

    private IHttpClient $_httpClient;

    private $_urlBase;
    private $_appId;

    function __construct(IHttpClient $httpClient) {
        $this->_httpClient = $httpClient;

        $this->_urlBase = env('WEATHERMAP_URL');
        $this->_appId   = env('WEATHERMAP_APPID');

    }

    public function getWeatherByCity(string $ciudad) {
        $endPoint    = 'data/2.5/weather?';
        $queryParams = "q={$ciudad}&APPID={$this->_appId}";
        $url = $this->_urlBase . "/" . $endPoint . $queryParams;
        $response = $this->_httpClient->httpGet($url);

        $body = $response->getBody();
        $content = $body->getContents();
        $json = json_decode($content);

        return $json;
    }

    public function getHistoryByCity(string $ciudad) {
        return 'Historial: '.$ciudad;
    }

}
