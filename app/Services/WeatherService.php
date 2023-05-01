<?php

namespace App\Services;
use App\Contracts\IWeather;
use App\Contracts\IWeatherRepository;
use App\Models\History;

class WeatherService implements IWeather
{

    private IWeatherRepository $_weatherRepository ;

    function __construct(IWeatherRepository $weatherRepository) {
         $this->_weatherRepository = $weatherRepository;
    }

    function getWeather(string $ciudad) {
        return $this->_weatherRepository->getWeatherByCity($ciudad);
    }

    function getHistory() {
        return History::all();
    }

    function createHistory($city, $weatherData) {
        $created = History::create([
            'city'             => $city,
            'history_weather'  => $weatherData,
        ]);
        return $created;
    }
}
