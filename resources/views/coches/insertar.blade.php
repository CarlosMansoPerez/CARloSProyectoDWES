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
        
        <style>
            .image-container {
                width: 200px;
                height: 200px;
                border: 1px solid #ccc;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .image-container img {
                max-width: 100%;
                max-height: 100%;
            }
        </style>
    </head>
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333;">

            <div class="mb-4" style="width:100%; background-color: #333333;">
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
                    </form>
                </nav>
            </div>

            <div class="rounded shadow-lg mt-12 my-8 bg-gray-200 hover:bg-zinc-300 hover:cursor-pointer hover:scale-105 duration-300 shadow-black" style="width: 55rem;height:38rem;margin:auto;" >
                
                <div class="bg-black pb-4 font-sans">
                    <p class="text-center pt-3 font-bold text-red-700 text-3xl">INSERTANDO NUEVO COCHE</p>
                </div>

                <div>
                    <form action="{{route('coches.guardar')}}" class="flex justify-center flex-col items-center" method="post">
                        @csrf

                        <div class="flex flex-row justify-around items-center" style="width:100%">

                            <div class="flex flex-col justify-center items-center">
                                <input class="mt-6 text-center w-60" name="marca"       style="width: 18rem" type="text" placeholder="Marca">
                                <input class="mt-6 text-center w-60" name="modelo"      style="width: 18rem" type="text" placeholder="Modelo">
                                <input class="mt-6 text-center w-60" name="precio"      style="width: 18rem" type="number" min="1000" max="500000" placeholder="Precio">
                                <input class="mt-6 text-center w-60" name="anio"        style="width: 18rem" type="number" min="1990" max="2023" placeholder="Año matriculacion">
                                <input class="mt-6 text-center w-60" name="kilometros"  style="width: 18rem" type="number" placeholder="kilometros">
                                <input class="mt-6 text-center w-60" name="combustible" style="width: 18rem" type="text" placeholder="combustible">
                                <input class="mt-6 text-center w-60" name="color"       style="width: 18rem" type="color" value="#ffffff"><label for="">Color</label>
                            </div>

                            <div class="flex flex-col justify-center align-center" style="width: 30%;height:27rem">
                                <div>
                                    <input type="text" id="url1" placeholder="URL Foto" name="foto" style="margin-top: 3rem;width:17rem">
                                    <div class="image-container" id="image1" style="width: 17rem">
                                        <img src="{{asset('img/siluetaCoche.png')}}" alt="Imagen predeterminada" style="width:40rem">
                                    </div>
                                </div>
                                <div>
                                    <input type="text" id="url2" placeholder="URL Logo" name="logo" class="mt-5" style="width: 17rem">
                                    <div class="image-container" id="image2" style="width: 17rem">
                                        <img src="{{asset('img/siluetaLogo.png')}}" alt="Imagen predeterminada" style="width:40rem">
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <input type="hidden" name="idUsu">
                        <input type="hidden" name="idCoc">
                        
                        <button type="submit" class="bg-red-700 hover:bg-black text-white mt-4 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded">GUARDAR</button>
                    </form>

                </div>
    
            </div>


            <script>
                function cargarImagen(inputId, imageId) {
                    var input = document.getElementById(inputId);
                    var imageContainer = document.getElementById(imageId);
                    var image = imageContainer.querySelector('img');
        
                    if (input.value.trim() === '') {
                        // Input vacío, mostrar imagen predeterminada
                        image.src = 'imagen_predeterminada.jpg';
                    } else {
                        // Cargar imagen desde la URL proporcionada
                        image.src = input.value;
                    }
                }
        
                var urlInput1 = document.getElementById('url1');
                var imageContainer1 = document.getElementById('image1');
                urlInput1.addEventListener('input', function() {
                    cargarImagen('url1', 'image1');
                });
        
                var urlInput2 = document.getElementById('url2');
                var imageContainer2 = document.getElementById('image2');
                urlInput2.addEventListener('input', function() {
                    cargarImagen('url2', 'image2');
                });
            </script>

    </body>
</html>