@extends('layouts.app')

@section('title', 'Histórico')

@section('content')
    <div class="container mx-auto p-4 rounded-lg">
        <h2 class="font-semibold text-white text-2xl pb-5">Histórico de Busca</h2>

        @if($weatherData->isEmpty())
            <p class="text-gray-600">Nenhum dado disponível.</p>
        @else
        <div class="mb-4">
            <input type="text" id="searchInput" class="rounded-lg pr-5 pl-5 bg-[#24343D] text-white p-3" placeholder="Buscar Município...">
        </div>
        <div class="max-h-[70vh] overflow-y-auto">
            <div class="overflow-x-auto">
                <table class="min-w-full rounded-lg" id="dataTable">
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
                            <th class="py-2 px-4 border-b font-light">Sensação Térmica</th>
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
        </div>
        @endif
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toLowerCase();
            table = document.getElementById('dataTable');
            tr = table.getElementsByTagName('tr');
            
            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = 'none';
                td = tr[i].getElementsByTagName('td');
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = '';
                            break;
                        }
                    }
                }
            }
        });
    </script>
@endsection
