<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CARloS') }} @yield("section", "- Coches")</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333; z-index:0;">

            <div style="height: 45rem; width: 100%; position:absolute; top:-255px;z-index:-1;">
                {{-- <video src="https://cdn.pixabay.com/vimeo/764361710/Coche%20-%20135728.mp4?width=1170&hash=99150cab80a5ed636bcf82ca0433c0da35b5d542" autoplay muted loop style="height:68rem;width:300rem; margin:auto;opacity:0.7;"></video> --}}
                <video src="{{asset('video/videoCoches.mp4')}}" autoplay muted loop style="height:68rem;width:300rem; margin:auto;opacity:0.7;"></video>
                {{-- <img src="../video/audi-r8-4721217_1920.jpg" style="height:73rem ; width:300rem; margin:auto;"> --}}
                <h1 class="hover:scale-105 duration-700 text-center text-red-700" style="position:absolute; top: 50%;left:27%;font-size:13rem;text-shadow:12px 12px 12px black;font-family:impact;">CAR<b class="font-serif text-black" style="font-size:9rem;text-shadow: 1px 1px 1px rgb(64, 64, 64)">lo</b>S</h1>
                <a href="#perfil" class="text-white hover:scale-105 hover:bg-red-700 hover:text-white duration-700 font-bold py-2 px-4 rounded text-center text-red-700 text-xl" style="border:3px solid black;text-shadow:2px 2px 2px black; width:12rem; position:absolute; left:44%; top:120%;">VER MÁS</a>
            </div>


            <div class="mb-4" style="width:100%; background-color: #333333;">
                <nav class="bg-black text-stone-50 font-bold font-sans text-center flex justify-center items-center" style="height: 3rem; margin-top:44.5rem;">
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100"         href="{{route('coches.listado')}}">INICIO</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100"         href="{{route('coches.listado')}}#perfil">COCHES</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100"         href="{{route('accesorios.listado')}}#accesorios" id="accesorios">ACCESORIOS</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100"         href="{{route('perfil')}}" id="perfil">PERFIL</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100 text-xl" href="{{route('carrito.listar', auth()->user()->idUsu)}}" id="carrito"><i class="bi bi-cart3"></i><span class="badge" style="font-size:0.9rem"><?=$productos?></span></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </nav>

                <!-- Page Content -->
                <main>
                    @yield('main')
                </main>

            </div>


    </body>
</html>