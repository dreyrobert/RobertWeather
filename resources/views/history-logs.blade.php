@extends('layouts.app')

@section('title', 'Histórico')

@section('content')
    <div class="container mx-auto p-4 rounded-lg">
        <h2 class="font-semibold text-white text-2xl pb-5">Histórico de Busca</h2>
        @if($weatherData->isEmpty())
            <p class="text-gray-600">Nenhum dado disponível.</p>
        @else
        <div class="max-h-[70vh] overflow-y-auto">
            <table class="min-w-full rounded-lg">
                <thead class="text-white bg-[#24343D] rounded-lg">
                    <tr class="text-left rounded-lg">
                        <th class="py-2 px-4 border-b font-light">Data/Hora</th>
                        <th class="py-2 px-4 border-b font-light">Cidade</th>
                        <th class="py-2 px-4 border-b font-light">Temperatura</th>
                        <th class="py-2 px-4 border-b font-light">Descrição</th>
                        <th class="py-2 px-4 border-b font-light">Velocidade do Vento</th>
                        <th class="py-2 px-4 border-b font-light">Pressão</th>
                        <th class="py-2 px-4 border-b font-light">Precipitação</th>
                        <th class="py-2 px-4 border-b font-light">Umidade</th>
                        <th class="py-2 px-4 border-b font-light">Sensação Termica</th>
                    </tr>
                </thead>
                <tbody class="bg-white rounded-lg">
                    @foreach($weatherData as $data)
                        <tr class="text-black">
                            <td class="py-2 px-4 border-b">{{ $data->location_localtime }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->location_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->current_temperature }} °C</td>
                            <td class="py-2 px-4 border-b">{{ $data->current_weather_descriptions }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->current_wind_degree }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->current_pressure }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->current_precip }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->current_humidity }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->current_feelslike }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
