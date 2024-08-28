<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black-homepage bg-cover bg-center lg:bg-no-repeat w-full h-screen">
    <nav class="flex flex-wrap items-center justify-between p-6 text-white">
        <div class="flex items-center flex-shrink-0">
            <h2 class="lg:text-4xl text-2xl font-semibold">Robert Weather</h2>
        </div>
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-gray-400 hover:border-gray-400" onclick="toggleMenu()">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 5h20v2H0V8zm0 5h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div id="menu" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block">
            <ul class="text-sm lg:flex-grow lg:flex justify-center">
                <li class="mt-4 lg:mt-0 lg:inline-block">
                    <a class="font-light hover:font-medium text-xl pr-3 pl-3 block lg:inline-block" href="{{ route('homepage') }}">Início</a>
                </li>
                <li class="mt-4 lg:mt-0 lg:inline-block">
                    <a class="font-light hover:font-medium text-xl pr-3 pl-3 block lg:inline-block" href="{{ route('weather-compare') }}">Comparador de Clima</a>
                </li>
            </ul>
            <div class="mt-4 lg:mt-0 lg:inline-block">
                <a class="btn-primary block lg:inline-block" href="{{ route('weather.list') }}">
                    Histórico
                </a>
            </div>
        </div>
    </nav>
    @yield('content')

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
