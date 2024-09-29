<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function show()
    {
        // OpenWeather API URL ve .env dosyasından API anahtarını alma
        $apiKey = env('WEATHER_API_KEY');
        $city = 'Istanbul';
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        // API'ye istek yapma
        $response = Http::get($url);

        // Yanıtı kontrol etme ve veriyi Blade'e gönderme
        if ($response->successful()) {
            $weatherData = $response->json();
            return view('weather', ['weather' => $weatherData]);
        } else {
            return view('weather', ['error' => 'Veri alınamadı']);
        }
    }
}
