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

            <div class="" style="width:100%; background-color: #333333;">
                <nav class="bg-black text-stone-50 font-bold font-sans text-center flex justify-center items-center" style="height: 3rem;">
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('coches.listado')}}">INICIO</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('coches.listado')}}#perfil">COCHES</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('accesorios.listado')}}#accesorios" id="accesorios">ACCESORIOS</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('perfil')}}" id="perfil">PERFIL</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100 text-xl" href="{{route('carrito.listar', auth()->user()->idUsu)}}" id="cariito"><i class="bi bi-cart3"></i></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </nav>

                <div style="height:665px;">
                    <div class="mt-12" style="float:left;width:50%">                
                        <p class="text-8xl text-red-700 font-sans mb-5" style="margin-left: 9%;margin-top:5%;margin-bottom:5%">Hola <b class="hover:text-white duration-700">{{auth()->user()->nombre}}</b></p><br>
                        
                        <form action="{{route('usuarios.actualizar')}}" method="post">
                            @csrf

                            <div class="flex flex-row justify-around align-center mb-3 text-white text-lg">
                            <div class="flex flex-col justify-start align-center mb-3 text-white text-lg">

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Nombre</label>
                                    <input type="text" name="nombre" value="{{auth()->user()->nombre}}" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Correo electrónico</label>
                                    <input type="text" name="email" value="{{auth()->user()->email}}" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Nº de teléfono</label>
                                    <input type="text" name="telefono" value="{{auth()->user()->numeroTelefono}}" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Direccón de entrega</label>
                                    <input type="text" name="direccion" value="{{auth()->user()->direccionEnvio}}" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                            </div>
                            <div class="flex flex-col justify-start align-center mb-3">

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Ciudad</label>
                                    <input type="text" name="ciudad" value="{{auth()->user()->ciudad}}" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Provincia</label>
                                    <input type="text" name="provincia" value="{{auth()->user()->provincia}}" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Código Postal</label>
                                    <input type="text" name="cp" value="{{auth()->user()->cp}}" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <button type="submit" class="text-lg bg-red-700 hover:bg-black hover:text-red-700 hover:scale-105 text-white font-bold rounded px-2 py-1" style="margin-top: 2rem">ACTUALIZAR</button>
                                </div>

                                <input type="hidden" name="idUsu" value="{{auth()->user()->idUsu}}">

                            </div>
                        </div>

                        </form>

                    </div>
                    <div style="float:right;width:50%">
                        <img src="{{asset("/img/cochePerfil.jpg")}}" style="height:665px;">
                    </div>
                </div>

            </div>


    </body>
</html>