<?php

namespace App\Contracts;
interface IWeatherRepository
{

    public function getWeatherByCity(string $ciudad);

    public function getHistoryByCity(string $ciudad);

}
