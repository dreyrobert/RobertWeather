<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black-homepage bg-cover bg-center bg-no-repeat w-full">
    <nav class="flex flex-row justify-around p-10 items-center text-white">
        <h2 class="text-4xl font-semibold">Robert Weather</h2>
        <ul class="flex justify-between">
            <li>
                <a class="font-light hover:font-medium text-xl pr-3 pl-3" href="{{ route('homepage') }}">Início</a>
            </li>
            <li>
                <a class="font-light hover:font-medium text-xl pr-3 pl-3" href="{{ route('weather-compare') }}">Comparador de Clima</a>
            </li>
        </ul>
        <a class="btn-primary" href="{{ route('history-log') }}">
            Histórico
        </a>
    </nav>
    @yield('content')
</body>
</html>
