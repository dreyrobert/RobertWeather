@php
    use Carbon\Carbon;
    Carbon::setLocale('pt_BR'); // Define o locale para português brasileiro
@endphp

<div class="h-[480px] w-[360px] bg-white rounded-lg flex flex-col items-center justify-end">
    <div class="relative w-full h-full rounded-tl-lg rounded-tr-lg">
        <div class="absolute inset-0 bg-gradient-to-r {{ $data['current']['temperature'] <= 15 ? 'from-[#CAECFF] to-[#78CFFF]' : 'from-[#FFF4CA] to-[#FFDD78]' }} rounded-tl-lg rounded-tr-lg opacity-25"></div>
        <div class="bg-1 bg-cover bg-center bg-no-repeat w-full h-full rounded-tl-lg rounded-tr-lg p-10">
            <h2 class="text-8xl font-bold text-white m-0 p-0">{{ $data['current']['temperature'] }}°</h2>
            <h2 class="uppercase text-lg font-bold text-white p-0 m-0">{{ $data['location']['name'] }}</h2>
        </div>
    </div>
    <div class="flex flex-row justify-between items-center pr-5 pl-5 pb-10 pt-10">
        <div>
            <h3 class="text-[#191919] pb-1 font-bold text-xl capitalize">{{ Carbon::parse($data['location']['localtime'])->translatedFormat('l, d F') }}</h3>
            <p class="text-sm text-[#6B6B6B] font-bold">Sensação Térmica de {{ $data['current']['feelslike'] }}°.</p>
            <p class="text-sm text-[#6B6B6B] font-bold">{{ $data['current']['weather_descriptions'][0] }}</p>
        </div>
        <div>
            <img src="{{ asset('icons/113.png') }}" alt="Clima" class="w-[50px] h-[50px]">
        </div>
    </div>
</div>