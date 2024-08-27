<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $apiKey = '210a8b8a96be435155b2c54a53279657';
        $apiUrl = 'http://api.weatherstack.com/current';

        $response = Http::get($apiUrl, [
            'access_key' => $apiKey,
            'query' => $city,
        ]);

        $weatherData = $response->json();

        if (isset($weatherData['error'])) {
            return redirect()->back()->withErrors(['message' => 'Cidade não encontrada.']);
        }

        return view('homepage', ['weatherData' => [$weatherData]]);
    }
}
