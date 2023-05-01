<?php

namespace App\Contracts;
use Symfony\Component\HttpFoundation\Request;
interface IWeather
{

    public function getWeather(string $ciudad);

    public function getHistory();

    public function createHistory($ciudad, $data);

}
