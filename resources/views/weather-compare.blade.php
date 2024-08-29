@extends('layouts.app')

@section('title', 'Comparador de Climas')

@section('content')
<div class="w-full flex flex-col items-center justify-center">
    <div class="text-center pt-10 pb-10">
        <h2 class="text-3xl font-bold text-white">Comparando climas com o <span class="bg-gradient-to-r from-[#CAECFF] to-[#78CFFF] text-transparent bg-clip-text">Robert Weather!</span></h2>
    </div>
    <form id="weather-compare-form" action="{{ route('weather.compare') }}" method="GET" class="flex lg:flex-row lg:gap-x-5 flex-col gap-y-5">
        <input type="text" name="first-city" id="first-city" class="rounded-lg pr-5 pl-5 p-3 bg-[#24343D] text-white" placeholder="Primeiro Município">
        <input type="text" name="second-city" id="second-city" class="rounded-lg pr-5 pl-5 p-3 bg-[#24343D] text-white" placeholder="Segundo Município">
        <button type="submit" class="btn-primary">Comparar</button>
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
        <div class="flex lg:flex-row flex-col pt-20 overflow-x-auto lg:gap-x-10 gap-y-10 items-center">
            @foreach($weatherData as $data)
                @php
                    $bg = 'bg-'.rand(1, 3);
                @endphp
                <x-weather :data="$data" :bg="$bg"/>
            @endforeach
            <div>
                <x-weather-comparison :data="$weatherData" />
            </div>
        </div>
    @endif
</div>

<script>
    document.getElementById('weather-compare-form').addEventListener('submit', function(event) {
        var firstCity = document.getElementById('first-city').value.trim();
        var secondCity = document.getElementById('second-city').value.trim();

        if (!firstCity || !secondCity) {
            alert('Por favor, preencha os dois municípios.');
            event.preventDefault();
        }
    });
</script>
@endsection
