<?php $total = 0; ?>
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

        <a style="position:absolute; top:2%;left:2%" class="bg-black hover:bg-red-700 duration-700 hover:scale-105 text-white font-bold rounded px-3 py-1" href="{{route('coches.listado')}}">VOLVER</a>

        <p class="text-center text-red-700 mt-2 text-4xl font-bold">Productos en el carrito de {{auth()->user()->nombre}}</p>

        <div style="width: 100%" class="h-auto px-5 py-3 text-center text-xl flex flex-row m-auto flex-wrap justify-start items-start">

            <div class="" style="width: 100%;background-color:#a9a9a9">
                @for ($i = 0; $i < count($datos); $i++)


                    <?php
                        $total += $datos[$i]->precio;
                    ?>

                        <div class="my-3 flex flex-wrap flex-row justify-between items-center" style=" width:100%; height:auto;">
                            
                            <div style="width: 50%;margin-top:0%">
                                <p class="text-6xl">{{$datos[$i]->marca}}</p>
                                <p class="text-3xl mb-2">{{$datos[$i]->modelo}}</p>
                                <p class="text-xl" style="margin-top: 5%">{{$datos[$i]->anio_matriculacion}} | {{$datos[$i]->kilometros}} | {{$datos[$i]->combustible}}</p>                
                                <p class="text-6xl mt-2 mb-5 text-red-700 font-bold">{{$datos[$i]->precio}}€</p>

                            </div>

                            <div  style="width: 50%">
                                <img class="mb-2" style="width:30rem" src="{{$datos[$i]->foto}}" >
                            </div>

                            <hr style="width:100%; margin:auto; height:3px;background:rgb(117, 117, 117)" class="mt-5">

                        </div>




                @endfor
            </div>

            <div class="flex flex-wrap flex-row justify-around items-center my-3 py-2" style="width: 100%;background-color:#a9a9a9">

                <div class="flex flex-wrap flex-col justify-center items-start">
                    <p class="mb-1">Direccion de envio: Alfredo Palma 21, Campomar 2, Bajo D</p>
                    <p class="mb-1">Numero de telefono; 640 72 77 53</p>
                    <p class="mb-1">Codigo postal: 29603</p>
                    <p class="mb-1">Ciudada: Marbella</p>
                    <p class="mb-1">Provincia: Málaga</p>
                    <p class="mb-1">Fecha estimada de entrega: 24/05/2023</p>
                </div>

                <div class="flex flex-wrap flex-col justify-center items-center">
                    <p style="margin-bottom: 20%" class="text-3xl font-bold">TOTAL: <b class="text-red-700">{{$total}}€</b></p>

                    <a style="width:15rem;" class="bg-black hover:bg-red-700 duration-700 hover:scale-105 text-white font-bold rounded px-3 py-1" href="">PAGAR</a>
                </div>
                
            </div>

        </div>
    </body>
</html>