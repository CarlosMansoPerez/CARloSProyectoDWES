<?php
    $total = 0;
?>
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

        <link rel="stylesheet" href="{{asset('styles/style.css')}}">
        
    </head>
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333; z-index:0;">

        <a style="position:absolute; top:2%;left:2%" class="bg-black hover:bg-red-700 duration-700 hover:scale-105 text-white hover:text-white font-bold rounded px-3 py-1" href="{{route('coches.listado')}}">VOLVER</a>

        <p class="text-center text-red-700 mt-2 text-4xl font-bold">Productos en el carrito de {{auth()->user()->nombre}}</p>

        <div style="width: 100%; height:auto;" class="h-auto px-5 py-3 text-center text-xl flex flex-row m-auto flex-wrap justify-start items-start">

            <div class="mt-3 p-5 flex flex-col align-center justify-center" style="width:50%;height:auto;min-height:40rem;background-color:#a9a9a9">
                
                @foreach ($datos as $item)
                    <div id="cardsCarrito" class="m-1 bg-black flex justify-around align-center flex-row p-2 mt-5">
                        <div class="flex flex-col justify-left align-center text-white mt-5">
                            <p>{{$item["marca"]}}</p>
                            <p>{{$item["modelo"]}}</p>
                            <p>{{$item["anio_matriculacion"]}} | {{$item["kilometros"]}} kms | {{$item["combustible"]}}</p>
                            <p class="mt-1">{{$item["precio"]}}€</p>
                        </div>
                        <div>
                            <img style="width:18rem" src="{{$item["foto"]}}" alt="">
                        </div>
                    </div>
                    <a href="{{route('carrito.borrar', $item["idCoc"])}}" class="text-lg bg-red-700 hover:bg-black hover:text-red-700 text-white font-bold rounded px-2 py-1">ELIMINAR</a>


                    <?php $total += $item["precio"] ?>

                @endforeach
            
            </div>

            <div class="flex flex-wrap flex-row justify-around items-center my-3 py-2" style="width: 50%;height:auto;min-height:40rem;background-color:#a9a9a9">

                <div class="flex flex-wrap flex-col justify-center items-start">
                    <p class="mb-5 font-bold">Datos de envío</p>
                    <p class="mb-1">Direccion de envio: Alfredo Palma 21, Campomar 2, Bajo D</p>
                    <p class="mb-1">Numero de telefono; 640 72 77 53</p>
                    <p class="mb-1">Codigo postal: 29603</p>
                    <p class="mb-1">Ciudada: Marbella</p>
                    <p class="mb-5">Provincia: Málaga</p>
                    <p class="mb-1 mt-5">Fecha estimada de entrega: 24/05/2023</p>
                </div>

                <div class="flex flex-wrap flex-col justify-center items-center">
                    <p style="margin-bottom: 20%" class="text-3xl font-bold">TOTAL: <b class="text-4xl text-red-700">{{$total}}€</b></p>

                        <a style="width:15rem;" class="bg-black hover:bg-red-700 duration-700 hover:scale-105 text-white hover:text-white font-bold rounded px-3 py-1" href="factura">PAGAR</a>
                </div>
                
            </div>

        </div>
    </body>
</html>