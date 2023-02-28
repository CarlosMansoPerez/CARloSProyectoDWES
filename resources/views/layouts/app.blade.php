<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CARloS') }} @yield("section", "- Coches")</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased bg-gray-100" style="margin:0; padding:0;">
        <div class="dark:bg-gray-900">

            <h1 class="font-bold text-7xl font-sans text-red-600 text-center my-7">CAR<b class="font-serif text-gray-700 text-6xl">lo</b>S</h1>

            <nav class="bg-gray-900 text-stone-50 font-bold text-center flex justify-center items-center" style="height: 3rem;">
                <a class="mx-10  hover:text-red-500" href="">INICIO</a>
                <a class="mx-10  hover:text-red-500" href="">COCHES</a>
                <a class="mx-10  hover:text-red-500" href="">ACCESORIOS</a>
                <a class="mx-10  hover:text-red-500" href="">PERFIL</a>
                <a class="mx-10  hover:text-white text-red-500" href="">SALIR</a>
            </nav>

            <!-- Page Content -->
            <main>
                @yield('main')
            </main>
        </div>
    </body>
</html>