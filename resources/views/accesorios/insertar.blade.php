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

            <div class="mb-7" style="width:100%; background-color: #333333;">
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

            <div class="rounded shadow-lg mt-12 my-8 bg-gray-200 hover:bg-zinc-300 hover:cursor-pointer hover:scale-105 duration-300 shadow-black" style="width: 35rem;height:30rem;margin:auto;" >
                
                <div class="bg-black pb-4 font-sans">
                    <p class="text-center pt-3 font-bold text-red-700 text-3xl">INSERTANDO NUEVO ACCESORIO</p>
                </div>

                <div>
                    <form action="{{route('accesorios.guardar')}}" class="flex justify-center flex-col items-center" method="post">
                        @csrf

                        <select name="coches" id="coches" class="mt-12" style="width:15rem;">
                            <option value="" selected disabled>Del Coche</option>
                            @foreach($coches as $item)
                                <option name="coche" value="{{$item->idCoc}}">{{$item->marca}}&nbsp;{{$item->modelo}}</option>
                            @endforeach
                        </select>
                        <input class="mt-6 text-center w-60" name="nombre" type="text" placeholder="Nombre">
                        <input class="mt-6 text-center w-60" name="precio" type="number" min="50" max="8000" placeholder="Precio">
                        <input class="mt-6 text-center w-60" name="foto"   type="url" placeholder="Foto">
                        
    
                        <button type="submit" class="bg-red-700 hover:bg-black text-white mt-12 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded">GUARDAR</button>
                    </form>

                </div>
    
            </div>




    </body>
</html>