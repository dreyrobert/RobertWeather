@php
    $temperatureComparison = $data[1]['current']['temperature'] - $data[0]['current']['temperature'];

    $humidityComparison = $data[1]['current']['humidity'] - $data[0]['current']['humidity'];

    $windSpeedComparison = $data[1]['current']['wind_speed'] - $data[0]['current']['wind_speed'];

    $pressureComparison = $data[1]['current']['pressure'] - $data[0]['current']['pressure'];
@endphp

<div class="flex flex-row gap-x-10">
    <div class="bg-white lg:rounded-lg flex flex-col gap-y-5 h-[480px] p-10 lg:pt-0 lg:pb-0 justify-center lg:max-w-[500px]"> 
        <h2 class="text-3xl font-bold text-[#5E5E5E]">Diferenças entre <span class="{{$temperatureComparison > 0 ? 'text-[#5C93B1]' : 'text-[#FABA18]'}}">{{ $data[0]['location']['name'] }}</span> e <span class="{{$temperatureComparison > 0 ? 'text-[#FABA18]' : 'text-[#5C93B1]'}}">{{$data[1]['location']['name']}}</span></h2>
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ ($temperatureComparison > 0 ? '+' : '') . $temperatureComparison }}°</h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Temperatura</h3>
        </div>
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ ($humidityComparison > 0 ? '+' : '') . $humidityComparison }}<span class="font-light text-2xl">%</span></h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Umidade do Ar</h3>
        </div>
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ ($windSpeedComparison > 0 ? '+' : '') . $windSpeedComparison }}<span class="font-light text-2xl">km/h</span</h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Velocidade do Vento</h3>
        </div>
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ ($pressureComparison > 0 ? '+' : '') . $pressureComparison }}<span class="font-light text-2xl">mbar</span</h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Pressão Atmosférica</h3>
        </div>
    </div>
</div>