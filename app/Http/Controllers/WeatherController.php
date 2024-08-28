<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherData;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function search(Request $request)
    {
        $city = $request->input('city');
        $cep = $request->input('cep');

        if (empty($city)) {
            $cepUrl = 'https://viacep.com.br/ws/' . $cep . '/json/';

            // Erro no Curl com verificação de SSL
            $cepResponse = Http::withoutVerifying()->get($cepUrl);
            
            $cepData = $cepResponse->json();
            $city = $cepData['localidade'] ?? null;

            if (!$city) {
                return redirect()->back()->withErrors(['message' => 'CEP não encontrado.']);
            }
        }

        $apiKey = env('API_KEY');
        $apiUrl = 'http://api.weatherstack.com/current';

        $response = Http::get($apiUrl, [
            'access_key' => $apiKey,
            'query' => $city,
        ]);

        $weatherData = $response->json();

        if (isset($weatherData['error'])) {
            return redirect()->back()->withErrors(['message' => 'Cidade não encontrada.']);
        }

        $this->saveWeatherData($weatherData);

        return view('homepage', ['weatherData' => [$weatherData]]);
    }

    public function compare(Request $request)
    {
        $firstCity = $request->input('first-city');
        $secondCity = $request->input('second-city');

        if (empty($firstCity || $secondCity)) {
            return redirect()->back()->withErrors(['message' => 'Preencha os dois campos.']);
        }

        $apiKey = env('API_KEY');
        $apiUrl = 'http://api.weatherstack.com/current';

        $responseFirst = Http::get($apiUrl, [
            'access_key' => $apiKey,
            'query' => $firstCity,
        ]);

        $responseSecond = Http::get($apiUrl, [
            'access_key' => $apiKey,
            'query' => $secondCity,
        ]);

        $weatherDataFirst = $responseFirst->json();
        $weatherDataSecond = $responseSecond->json();

        if (isset($weatherDataFirst['error']) || isset($weatherDataSecond['error'])) {
            return redirect()->back()->withErrors(['message' => 'Cidade não encontrada.']);
        }

        return view('weather-compare', ['weatherData' => [$weatherDataFirst, $weatherDataSecond]]);
    }

    public function list()
    {
        $weatherData = WeatherData::all();

        return view('history-logs', ['weatherData' => $weatherData]);
    }

    private function saveWeatherData(array $weatherData): void
    {
        $weatherDataModel = new WeatherData();
        $weatherDataModel->fill([
            'request_type' => $weatherData['request']['type'],
            'request_query' => $weatherData['request']['query'],
            'request_language' => $weatherData['request']['language'],
            'request_unit' => $weatherData['request']['unit'],
            'location_name' => $weatherData['location']['name'],
            'location_country' => $weatherData['location']['country'],
            'location_region' => $weatherData['location']['region'],
            'location_timezone_id' => $weatherData['location']['timezone_id'],
            'location_localtime' => $weatherData['location']['localtime'],
            'current_observation_time' => $weatherData['current']['observation_time'],
            'current_temperature' => $weatherData['current']['temperature'],
            'current_weather_code' => $weatherData['current']['weather_code'],
            'current_weather_descriptions' => $weatherData['current']['weather_descriptions'][0] ?? null,
            'current_wind_speed' => $weatherData['current']['wind_speed'],
            'current_wind_degree' => $weatherData['current']['wind_degree'],
            'current_wind_dir' => $weatherData['current']['wind_dir'],
            'current_pressure' => $weatherData['current']['pressure'],
            'current_precip' => $weatherData['current']['precip'],
            'current_humidity' => $weatherData['current']['humidity'],
            'current_cloudcover' => $weatherData['current']['cloudcover'],
            'current_feelslike' => $weatherData['current']['feelslike'],
            'current_uv_index' => $weatherData['current']['uv_index'],
            'current_visibility' => $weatherData['current']['visibility'],
            'current_is_day' => $weatherData['current']['is_day'] === 'yes',
        ]);

        $weatherDataModel->save();
    }
}
