<?php

namespace App\Providers;

use App\Core\GuzzleHttpClient;
use Illuminate\Support\ServiceProvider;
use App\Contracts\IHttpClient;
use App\Contracts\IWeatherRepository;
use App\Repository\WeatherRepository;
use App\Contracts\IWeather;
use App\Services\WeatherService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(IWeather::class, WeatherService::class);
         $this->app->bind(IWeatherRepository::class, WeatherRepository::class);
         $this->app->bind(IHttpClient::class, GuzzleHttpClient::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
