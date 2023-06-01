<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>{{ config('app.name', 'CARloS') }} @yield("section", "- Coches")</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333;">

            <div class="" style="width:100%; background-color: #333333;">
                <nav class="bg-black text-stone-50 font-bold font-sans text-center flex justify-center items-center" style="height: 3rem;">
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('coches.listado')}}">INICIO</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('coches.listado')}}#perfil">COCHES</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('accesorios.listado')}}#accesorios">ACCESORIOS</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('perfil')}}">PERFIL</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>                </nav>
            </div>

            <div class="bg-zinc-800 flex flex-wrap justify-left items-center flex-row" style="width: 100%;padding-bottom:1.7rem">

                {{-- FOTO --}}
                <div class="w-7/12" style="margin-left: 5%; margin-top:2%">
                    <img class="w-full" src="{{$imagen->foto}}">
                </div>

                {{-- DATOS --}}
                <div class="p-3 flex justify-center flex-col items-center text-center w-3/12" style="margin-left: 6%">

                    <div class="flex flex-wrap justify-center items-center flex-row mb-5" style="margin-left: -4rem; margin-top:4rem;">
                        <div class="mr-3">
                            <img src="{{$imagen->logo}}" style="width:4rem;margin-bottom:2rem">
                        </div>
                        <div>
                            <p class="text-5xl text-white font-bold">{{$imagen->marca}}</p>
                            <p class="text-5xl text-red-700 font-bold" style="margin-left: -1rem">{{$imagen->modelo}}</p>
                        </div>
                    </div>
                    

                    <div class="flex flex-row justify-center items-center" style="margin-top: 2rem">

                        <div class="flex flex-col justify-center items-center mr-5" style="width: 12rem; min-height:12rem;">
                            <p class="text-white text-2xl mb-1">Matriculado en</p> 
                            <p class="text-3xl text-white font-bold" style="margin-bottom: 2rem">{{$imagen->anio_matriculacion}}</p>

                            <p class="text-white text-2xl mb-1">Color disponible</p>
                            <div class="text-sm font-bold text-black">
                                <div class="text-sm font-bold text-black text-lg" style="background-color: {{$imagen->color}}; width:2.2rem; height: 2.2rem; border: 3px solid black">&nbsp;</div>
                            </div>

                        </div>

                        <div class="flex flex-col justify-center items-center ml-5" style="width: 12rem; min-height:12rem;">

                            <p class="text-white text-2xl mb-1">Kilómetros</p> 
                            <p class="text-3xl text-white font-bold" style="margin-bottom: 2rem">{{$imagen->kilometros}}</p>

                            <p class="text-white text-2xl mb-1">Combustible</p> 
                            <p class="text-3xl text-white font-bold">{{$imagen->combustible}}</p>
                        </div>

                    </div>

                    <p class="text-red-700 font-bold hover:scale-105 hover:text-white duration-700 mt-5" style="font-size: 5rem;">{{$imagen->precio}}€</p>

                    <form action="{{route('carrito.agregar')}}" method="POST">
                        @csrf

                            <input type="hidden" value="<?= $imagen->idCoc ?>" name="idCoche">
                            <input type="hidden" value="<?= auth()->user()->idUsu ?>" name="idUsu">

                            <button type="submit" class="bg-red-700 hover:bg-black duration-700 hover:scale-105 text-white font-bold rounded px-3 py-1 mt-12 pb-2 pt-2 text-xl" style="width:200%; margin-left:-35%;">AÑADIR <i class="bi bi-cart3"></i></button>
                        
                        </form>

                </div>
            </div>

    </body>
</html>