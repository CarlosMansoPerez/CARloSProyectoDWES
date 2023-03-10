<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
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
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333;">

            <div class="" style="width:100%; background-color: #333333;">
                <nav class="bg-black text-stone-50 font-bold font-sans text-center flex justify-center items-center" style="height: 3rem;">
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="">INICIO</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('coches.listado')}}">COCHES</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('accesorios.listado')}}">ACCESORIOS</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="">PERFIL</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>                </nav>
            </div>

            <div class="bg-zinc-800" style="width: 100%;height:665px;">
                <img src="{{$imagen->foto}}" style="width:60rem;height:41.5rem;">
                <div style="position:absolute;top:20%;left:70%;">
                    <p class="text-4xl text-white font-bold">{{$imagen->marca}}</p>
                    <p class="text-3xl text-red-700 font-bold">{{$imagen->modelo}}</p>
                    <img src="{{$imagen->logo}}" style="width:6rem;position:absolute;top:-2%;left:85%;">
                    <p class="mt-12 text-white text-xl">Matriculado en</p> 
                    <p class="text-3xl text-white font-bold">{{$imagen->anio_matriculacion}}</p>
                    <p class="mt-12 text-white text-xl">Color disponible</p>
                    <div class="text-sm font-bold text-black mt-2">
                        <div class="text-sm font-bold text-black text-lg" style="background-color: {{$imagen->color}}; width:2.2rem; height: 2.2rem; border: 3px solid black">&nbsp;</div>
                    </div>
                    <p class="mt-8 ml-12 text-red-700 font-bold hover:scale-105 hover:text-white duration-700" style="font-size: 5rem;">{{$imagen->precio}}€</p>
                </div>
            </div>

            <a href="{{route('coches.listado')}}" style="position:absolute;top:90%;left:78%;" class="bg-white hover:bg-black text-black hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded">VOLVER</a>


    </body>
</html>