<?php

namespace App\Http\Controllers\Main\Weather;

use App\Action\ContactMessagAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Weather\WeatherRequest;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weather()
    {
        return view('main.weather');
    }


    public function GetWeather(WeatherRequest $request,)
    {
        $data = $request->validated();
        $api_key = '4a6a70a3ab88b3cd63f586be630162a3';

        $url = "https://api.openweathermap.org/data/2.5/weather?q={$data['city']}&appid={$api_key}&units=metric";


        // Выполнение GET запроса с использованием HTTP клиента Laravel
        $response = Http::get($url);


        // Проверка на ошибки при выполнении запроса
        if ($response->failed()) {
            // Обработка ошибки
            // Например, можно выбросить исключение или вернуть ошибку в какой-то структурированной форме
            return "Ошибка при выполнении запроса: {$response->status()}";
        }


        $weatherData = $response->json();



        return view('main.ShowWeather', compact('weatherData'));

    }

}
