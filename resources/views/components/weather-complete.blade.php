<div class="flex lg:flex-row flex-col lg:gap-x-10 gap-y-10 pb-10 lg:pb-0">
    @php
        $bg = 'bg-'.rand(1, 3);
    @endphp
    <x-weather :data="$data" :bg="$bg" />
    <div class="bg-white rounded-lg flex flex-col gap-y-5 h-[480px] pl-10 pr-10 justify-center"> 
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ $data['current']['wind_speed'] }}<span class="font-light text-2xl">km/h</span</h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Velocidade do Vento</h3>
        </div>
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ $data['current']['pressure'] }}<span class="font-light text-2xl">mbar</span</h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Pressão Atmosférica</h3>
        </div>
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ $data['current']['humidity'] }}<span class="font-light text-2xl">%</span</h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Umidade do Ar</h3>
        </div>
        <div class="flex flex-col gap-y-0 text-[#5E5E5E]">
            <h2 class="font-bold text-4xl">{{ $data['current']['precip'] }}<span class="font-light text-2xl">mm</span</h2>
            <h3 class="font-bold p-0 m-0 text-2xl">Precipitação</h3>
        </div>
        <h2 class="font-bold text-4xl text-[#5E5E5E]">{{ $data['current']['uv_index'] }} <span class="font-light text-2xl">Índice UV</span</h2>
    </div>
</div>