<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
  public function fetchWeatherData($latitude, $longitude){
    $response = Http::get('https://api.open-meteo.com/v1/forecast',
    [
      'latitude' => $latitude,
      'longitude' => $longitude,
      'current' => 'temperature_2m,relative_humidity_2m,weather_code',
      'hourly' => 'temperature_2m,wind_speed_10m',
      'timezone' => 'Asia/Tokyo',
    ]);
    if ($response->failed()) {
      throw new \Exception('Data retrieval failed.');
    }
    return $response->json();
  }
}