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
        
        <style>
            .widthInput{
                width: 100% !important;
            }
            #cambioContraseña{
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                flex-direction: column; 
                width:30%;
                height:auto;
                background-color:rgb(0, 0, 0, .6);
                position:absolute;
                top:20%;
                left:60%;
                border-radius: 20px;
                color: white;
                padding-top: 4%;
                padding-bottom: 4%;
            }
            #cambioContraseña:hover{
                background-color: black
            }
            .divContraseña{
                display: flex;
                flex-direction: column;
                width: 100%;
                justify-content: center;
                align-items:center; 
                margin-top: 10%
            }
            tr:hover:not(#cabecera){
                background-color: black;
                color: red;
                transition: .1s;
                cursor: pointer;
            }
            .informacion {
                display: none;
                position: absolute;
                left: 38%;
                margin-top: -5%;
                background-color: rgb(0, 0, 0);
                color: white;
                text-align: left;
                width: 25rem;
                padding: .5%;
                border: 4px solid rgb(157, 0, 0);
                z-index: 999;
            }





        </style>
    </head>
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333; z-index:0;">

            <div class="" style="width:100%; background: rgb(0,0,0);background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(51,51,51,1) 57%);">
                <nav class="bg-black text-stone-50 font-bold font-sans text-center flex justify-center items-center" style="height: 3rem;">
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('coches.listado')}}">INICIO</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('coches.listado')}}#perfil">COCHES</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('accesorios.listado')}}#accesorios" id="accesorios">ACCESORIOS</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100" href="{{route('perfil')}}" id="perfil">PERFIL</a>
                    <a class="mx-10  hover:text-red-700 hover:scale-105 duration-100 text-xl" href="{{route('carrito.listar', auth()->user()->idUsu)}}" id="cariito"><i class="bi bi-cart3"></i><span class="badge" style="font-size:0.9rem"><?=$productos?></span></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </nav>

                @if (Session::has('mensaje'))
                    <div id="mensaje-alerta" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4" style="margin:auto; width:100%; position:absolute; z-index:999">
                        {{ Session::get('mensaje') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            document.getElementById('mensaje-alerta').style.display = 'none';
                        }, 2000);
                    </script>

                @endif

                @if (Session::has('cambioCon'))
                        <div id="cambioCon" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4" style="margin:auto; width:100%; position:absolute; z-index:999">
                            {{ Session::get('cambioCon') }}
                        </div>
    
                        <script>
                            setTimeout(function() {
                                document.getElementById('cambioCon').style.display = 'none';
                            }, 2000);
                        </script>
    
                        @endif

                        @if (Session::has('falloConRep'))
                        <div id="falloConRep" class="bg-red-500 text-white px-4 py-2 rounded-md mb-4" style="margin:auto; width:100%; position:absolute; z-index:999">
                            {{ Session::get('falloConRep') }}
                        </div>
    
                        <script>
                            setTimeout(function() {
                                document.getElementById('falloConRep').style.display = 'none';
                            }, 2000);
                        </script>
    
                        @endif

                        @if (Session::has('falloConActual'))
                        <div id="falloConActual" class="bg-red-500 text-white px-4 py-2 rounded-md mb-4" style="margin:auto; width:100%; position:absolute; z-index:999">
                            {{ Session::get('falloConActual') }}
                        </div>
    
                        <script>
                            setTimeout(function() {
                                document.getElementById('falloConActual').style.display = 'none';
                            }, 2000);
                        </script>
    
                        @endif


                <div style="height:665px;">
                    <div class="mt-12" style="float:left;width:50%">                
                        <p class="text-8xl text-red-700 font-sans mb-5" style="margin-left: 9%;margin-top:5%;margin-bottom:5%">Hola <b class="hover:text-white duration-700">{{auth()->user()->nombre}}</b></p><br>
                        
                        <form action="{{route('usuarios.actualizar')}}" method="post">
                            @csrf

                            <div class="flex flex-row justify-around align-center mb-3 text-white text-lg">
                            <div class="flex flex-col justify-start align-center mb-3 text-white text-lg">

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Nombre</label>
                                    <input type="text" name="nombre" value="{{auth()->user()->nombre}}" class="rounded-lg text-red-700 hover:bg-gray-400 widthInput">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Correo electrónico</label>
                                    <input type="text" name="email" value="{{auth()->user()->email}}" class="rounded-lg text-red-700 hover:bg-gray-400 widthInput">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Nº de teléfono</label>
                                    <input type="text" name="telefono" value="{{auth()->user()->numeroTelefono}}" class="rounded-lg text-red-700 hover:bg-gray-400 widthInput">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Dirección de entrega</label>
                                    <input type="text" name="direccion" value="{{auth()->user()->direccionEnvio}}" class="rounded-lg text-red-700 hover:bg-gray-400 widthInput">
                                </div>

                            </div>
                            <div class="flex flex-col justify-start align-center mb-3">

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Ciudad</label>
                                    <input type="text" name="ciudad" value="{{auth()->user()->ciudad}}" class="rounded-lg text-red-700 hover:bg-gray-400 widthInput">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Provincia</label>
                                    <input type="text" name="provincia" value="{{auth()->user()->provincia}}" class="rounded-lg text-red-700 hover:bg-gray-400 widthInput">
                                </div>

                                <div class="flex flex-col justify-start align-center mb-3">
                                    <label for="">Código Postal</label>
                                    <input type="text" name="cp" value="{{auth()->user()->cp}}" class="rounded-lg text-red-700 hover:bg-gray-400 widthInput">
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

                        <img src="{{asset("/img/cochePerfil.jpg")}}" style="height:680px;opacity:.6">
                        <div id="cambioContraseña" class="hover:scale-110 duration-500">
                            <form action="{{route('usuarios.contraseña')}}" method="POST">
                                @csrf
                                <p class="text-3xl mb-5 font-bold">Cambio Contraseña</p>
                                <div class="divContraseña">
                                    <label for="">Contraseña Actual</label>
                                    <input type="text" name="conActual" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>
                                <div class="divContraseña">
                                    <label for="">Nueva Contraseña</label>
                                    <input type="text" name="conNueva" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>
                                <div class="divContraseña">
                                    <label for="">Repita Nueva Contraseña</label>
                                    <input type="text" name="conNuevaRep" class="rounded-lg text-red-700 hover:bg-gray-400">
                                </div>

                                <button class="text-lg bg-red-700 hover:bg-white hover:text-red-700 hover:scale-105 text-white font-bold rounded px-2 py-1" style="margin-top: 2rem">CAMBIAR CONTRASEÑA</button>
                                </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-12 flex flex-col justify-center items-center flex-wrap pt-5" style="padding-bottom:10%;background: rgb(51,51,51);background: linear-gradient(180deg, rgba(51,51,51,1) 42%, rgba(0,0,0,1) 100%); ">
                
                <p class="text-3xl text-white font-bold">Resumen de ventas</p>

                <div class="flex flex-row justify-center items-center flex-wrap" style="width: 100%">

                    <table class="mt-5 border-2 text-center text-white text-xl mt-12" style="width: 90%; background-color:gray;">
                        <thead class="border-2 bg-black font-bold text-white">
                            <tr id="cabecera">
                                <th class="border-2 py-2">Nº de Venta</th>
                                <th class="border-2 py-2">Usuario</th>
                                <th class="border-2 py-2">Marca</th>
                                <th class="border-2 py-2">Modelo</th>
                                <th class="border-2 py-2">Importe</th>
                                <th class="border-2 py-2">Fecha</th>
                            </tr>
                            </thead>
                            <tbody class="border-2">
                                @foreach ($ventas as $venta)
                                <tr>
                                    <td class="border-2">{{$venta->idVen}}</td>
                                    <td style="width:18rem;" class="border-2">
                                        {{$venta->email}}
                                        <i style="float: right;" class="bi bi-info-circle-fill text-red-700 pr-5 infoUsu"></i>
                                        <div class="informacion">
                                            <p>{{ $venta->nombre }}</p>
                                            <p>{{ $venta->email }}</p>
                                            <p>{{ $venta->numeroTelefono }}</p>
                                            <p>{{ $venta->ciudad }}</p>
                                            <p>{{ $venta->direccionEnvio }}</p>
                                        </div>
                                    </td>
                                    <td class="border-2">{{$venta->marca}}</td>
                                    <td class="border-2">{{$venta->modelo}}</td>
                                    <td class="border-2">{{$venta->importe}}€</td>
                                    <td class="border-2">{{$venta->fechaCompra}}</td>
                                </tr>
                            @endforeach
                            
                            
                            </tbody>
                    </table>

                </div>

            </div>

            <script>

                var infoUsuElements = document.querySelectorAll('.infoUsu');

                infoUsuElements.forEach(function(element) {

                element.addEventListener('mouseover', function() {
                    var informacion = this.nextElementSibling;
                    informacion.style.display = 'block';
                });

                element.addEventListener('mouseout', function() {
                    var informacion = this.nextElementSibling;
                    informacion.style.display = 'none';
                });
                });

            </script>
    </body>
</html>