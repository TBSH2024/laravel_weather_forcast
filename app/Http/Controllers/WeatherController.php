<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;
use App\Enums\City;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        $cityName = $request->input('city', 'Tokyo');

        try {
            $city = City::from($cityName);
        } catch (\Exception $e) {
            return response()->json('error', $e->getMessage(), 500);
        }
        $cityLocation = $city->getCoordinates();

        try {
            $weatherData = $this->weatherService->fetchWeatherData($cityLocation['latitude'], $cityLocation['longitude']);
            // dd($weatherData);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $cities = City::getAllCities();
        
        return view('index', compact('city', 'weatherData', 'cities'));
    }
}
