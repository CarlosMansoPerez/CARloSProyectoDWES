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
        <script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script defer src="{{asset('js/carrito.js')}}"></script>
        
    </head>

    <body class="font-sans" style="margin:0; padding:0; background-color: #333333; z-index:0;">

        <a style="position:absolute; top:2%;left:2%" class="bg-black hover:bg-red-700 duration-700 hover:scale-105 text-white hover:text-white font-bold rounded px-3 py-1" href="{{route('coches.listado')}}">VOLVER</a>

        <p class="text-center text-red-700 mt-2 text-4xl font-bold">Carrito de {{auth()->user()->nombre}}</p>

        <div style="width: 100%; height:auto;" class="h-auto px-5 py-3 text-center text-xl flex flex-row m-auto flex-wrap justify-start items-start">

            <div class="mt-3 p-5 flex flex-col align-center justify-center" style="width:50%;height:auto;min-height:40rem;background-color:#a9a9a9">
            
            <?php
                $productosFactura = [];
                if(isset($datos)){
            ?>

            <form action="{{asset('actions/pdf.php')}}" method="POST">

                <b id="extras" class="extras text-lg bg-black hover:bg-white hover:text-red-700 text-white font-bold rounded px-2 py-1">VER EXTRAS</b>

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

                    <div>
                        <a href="{{route('carrito.borrar', $item["idCoc"])}}" class="text-lg bg-red-700 hover:bg-black hover:text-red-700 text-white font-bold rounded px-2 py-1">ELIMINAR</a>
                    </div>

                    <?php $total += $item["precio"] ?>

                    <div id="ventanaAccesorios" class="ventanaAccesorios">
                        <b id="cerrarAccesorios"></b>
                        @foreach ($accesorios as $accesorio)
                            <?php if($accesorio['idCoc'] == $item['idCoc']){ ?>
                                <div class="p-2 flex justify-between flex-row items-center" style="border: 2px solid red;">
                                    <div class="w-9/12">
                                        <p>{{$accesorio['nombre']}}</p>
                                        <p class="font-bold">{{$accesorio['precio']}}€</p>
                                    </div>
                                    <img src="{{$accesorio['foto']}}" class="mr-8" style="width:8rem;">
                                    <div class="w-3/12 text-left">
                                        <b data-precio="{{$accesorio['precio']}}" data-nombre="{{$accesorio['nombre']}}" class="text-lg bg-red-700 hover:bg-black hover:text-white hover:scale-105 text-white font-bold rounded py-1 px-2 mt-5 aniadir">AÑADIR</b>
                                    </div>
                                </div>
                            <?php } ?>
                        @endforeach
                        <p></p>
                    </div>

                @endforeach

            <?php
                }else{
            ?>
            <div class="flex justify-end align-center flex-col">
                <p class="text-black text-3xl">El carrito está vacío.</p>
                <a href="{{route('coches.listado')}}" class="text-lg bg-red-700 hover:bg-black hover:text-red-700 hover:scale-105 text-white font-bold rounded py-1 mt-5" style="width:20%;margin-left:40%">¡ LLÉNALO !</a>
            </div>
            <?php
                }
            ?>
            
            </div>

            <div class="flex flex-wrap flex-row justify-around items-center my-3 py-2" style="width: 50%;height:auto;min-height:40rem;background-color:#a9a9a9">

                <div class="flex flex-wrap flex-col justify-center items-start" style="text-shadow:1px 1px 1px black">
                    <p class="mb-5 font-bold">Datos de envío</p>
                    <p class="mb-1">Direccion de envio: {{auth()->user()->direccionEnvio}}</p>
                    <p class="mb-1">Numero de telefono: {{auth()->user()->numeroTelefono}}</p>
                    <p class="mb-1">Codigo postal: {{auth()->user()->cp}}</p>
                    <p class="mb-1">Ciudada: {{auth()->user()->ciudad}}</p>
                    <p class="mb-5">Provincia: {{auth()->user()->provincia}}</p>
                    <?php if(isset($datos)){ ?>
                    <p class="mb-1 mt-5">Fecha estimada de entrega: <?= isset($datos)? date('d/m/Y', strtotime('+9 days')) : "" ?></p>
                    <?php } ?>
                </div>

                <div class="flex flex-wrap flex-col justify-center items-center" style="width:40rem">
                    
                    <?php if(isset($datos)){ ?>
                    <p style="text-shadow:1px 1px 1px black;margin-left:-50%" class="font-bold mb-5">Resumen del pedido:</p>
                    <?php } ?>
                    <div id="resumen" class="flex flex-wrap flex-col justify-start items-start text-left mb-5" style="text-shadow:1px 1px 1px black; margin-left:-35%">
                        <?php if(isset($datos)){ ?>
                        @foreach ($datos as $productos)
                        <div class="flex flex-row justify-start items-start">
                            <p style="width:15rem">{{$productos["marca"]}} {{$productos['modelo']}}</p><b>{{$productos['precio']}}€</b>
                        </div>
                        
                        <?php array_push($productosFactura, $productos["marca"],$productos["modelo"],$productos["anio_matriculacion"]); ?>
                        @endforeach
                        <?php } ?>
                    </div>

                    <p style="margin-bottom: 5%" class="text-3xl font-bold">TOTAL: <b id="total" class="text-4xl text-red-700">{{$total}}</b><b class="text-4xl text-red-700">€</b></p>

                    <?php $productosFacturaString = implode(",", $productosFactura);?>
                    <input type="hidden" name="total" value="{{$total}}">
                    <input type="hidden" name="nombre" value="{{auth()->user()->nombre}}">
                    <input type="hidden" name="email" value="{{auth()->user()->email}}">
                    <input type="hidden" name="direccion" value="{{auth()->user()->direccionEnvio}}">

                        <button type="submit"  style="width:15rem;" class="bg-black hover:bg-red-700 duration-700 hover:scale-105 text-white hover:text-white font-bold rounded px-3 py-1">PAGAR</button>
                    </form>
                    </div>
                
            </div>

        </div>
    </body>
</html>