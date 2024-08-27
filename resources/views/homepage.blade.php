@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="w-full flex flex-col items-center justify-center">
    <div class="w-[500px] text-center pt-10 pb-10">
        <h2 class="text-3xl font-bold text-white">Vendo o clima de todo o mundo com o <span class="bg-gradient-to-r from-[#CAECFF] to-[#78CFFF] text-transparent bg-clip-text">Robert Weather!</span></h2>
    </div>
    <form id="weather-form" action="{{ route('weather.search') }}" method="GET" class="flex flex-row gap-x-5">
        <input type="text" name="city" id="city" class="rounded-lg pr-5 pl-5 bg-[#24343D] text-white" placeholder="Município">
        <input type="text" name="cep" id="cep" class="rounded-lg pr-5 pl-5 bg-[#24343D]" placeholder="Digite o CEP">
        <button type="submit" class="btn-primary">Buscar</button>
    </form>
    @if($errors->any())
        <div class="mt-4 p-4 mt-10 bg-red-500 text-white rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($weatherData) && is_array($weatherData))
        <div class="flex flex-row pt-20 overflow-x-auto">
            @foreach($weatherData as $data)
                <x-weather :data="$data" />
            @endforeach
        </div>
    @endif
</div>

<script>
    document.getElementById('weather-form').addEventListener('submit', function(event) {
        var city = document.getElementById('city').value.trim();
        var cep = document.getElementById('cep').value.trim();

        if (!city && !cep) {
            alert('Por favor, preencha pelo menos um campo (Município ou CEP).');
            event.preventDefault(); // Impede o envio do formulário
        }
    });
</script>
@endsection
