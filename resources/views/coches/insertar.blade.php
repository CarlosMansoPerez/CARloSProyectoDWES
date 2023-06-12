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

                            <div class="flex flex-col justify-center items-center mt-5">

                                <select name="marca" id="marcaSelect" style="width: 18rem" class="text-center">
                                    <option value="" selected disabled>Marca</option>
                                    @foreach ($marcas as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>

                                <select id="modeloSelect" name="modelo" style="width: 18rem" class="mt-6 text-center">
                                <option value="">Selecciona una marca primero</option>
                                </select>
                                
                                <input class="mt-6 text-center w-60" name="precio"      style="width: 18rem" type="number" min="1000" max="500000" placeholder="Precio">
                                <input class="mt-6 text-center w-60" name="anio"        style="width: 18rem" type="number" min="1990" max="2023" placeholder="Año matriculacion">
                                <input class="mt-6 text-center w-60" name="kilometros"  style="width: 18rem" type="number" placeholder="Kilometros">
                                
                                <select name="combustible" id="combustible" class="mt-6 text-center" style="width: 18rem">
                                    <option value="" selected disabled>Combustible</option>
                                    <option value="Diesel">Diésel</option>
                                    <option value="Gasolina">Gasolina</option>
                                </select>

                                <input class="mt-6 text-center w-60" name="potencia"  style="width: 18rem" type="number" min="100" max="700" placeholder="Potencia CV">
                            </div>

                            <div class="flex flex-col justify-center items-center" style="width: 30%;height:26rem">
                                <div style="margin-top:-5%">
                                    <input type="text" id="url1" placeholder="URL Foto" name="foto" style="margin-top: 3rem;width:17rem">
                                    <div class="image-container" id="image1" style="width: 17rem">
                                        <img src="{{asset('img/siluetaCoche.png')}}" alt="Imagen predeterminada" style="width:40rem">
                                    </div>
                                </div>
                                <div style="margin-top: -20%">
                                    <input type="text" id="logoInput" placeholder="URL Logo" name="logo" class="mt-5" style="width: 17rem; opacity:0;">
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
        
                var urlInput2 = document.getElementById('logoInput');
                var imageContainer2 = document.getElementById('image2');
                urlInput2.addEventListener('change', function() {
                    cargarImagen('logoInput', 'image2');
                });


                var marcaSelect = document.getElementById('marcaSelect');
                var modeloSelect = document.getElementById('modeloSelect');
                var logoInput = document.getElementById('logoInput');

                // Función para cargar los modelos según la marca seleccionada
                function cargarModelos() {

                    var marcaSeleccionada = marcaSelect.value;

                    // Limpio las opciones anteriores
                    modeloSelect.innerHTML = '';

                    // Obtengo los modelos correspondientes a la marca seleccionada
                    var modelos = obtenerModelos(marcaSeleccionada);

                    // Agrego las opciones de modelos al select
                    modelos.forEach(modelo => {
                        var option = document.createElement('option');
                        option.value = modelo;
                        option.text = modelo;
                        modeloSelect.appendChild(option);
                    });
                }

                marcaSelect.addEventListener('change', cargarModelos);
                marcaSelect.addEventListener('change', cambiarLogo);

                // Modelos de marca específica
                function obtenerModelos(marca) {
                    switch (marca) {
                        case 'Volkswagen':
                            return ['Golf GTI', 'Polo GTI'];
                        case 'BMW':
                            return ['Serie 1', 'Serie 3', 'Serie 5', 'X6'];
                        case 'Mercedes-Benz':
                            return ['Clase A', 'Clase C', 'Clase E', 'Clase S'];
                        case 'Audi':
                            return ['A3', 'A4', 'A6', 'Q5'];
                        case 'Ford':
                            return ['Focus', 'Mondeo', 'Mustang'];
                        case 'Porsche':
                            return ['911 Carrera', ' Cayenne', 'Panamera', 'Boxster', 'Cayman', 'Macan'];
                        case 'Ferrari':
                            return ['Portofino', '488 GTB', '812 Superfast', 'SF90 Stradale'];
                        case 'Toyota':
                            return ['Yaris GR'];
                        case 'Honda':
                            return ['Civic', 'HR-V', 'CR-V'];
                        case 'Renault':
                            return ['Clio RS', 'Mégane RS'];
                        case 'Mini':
                            return ['Cooper', 'Clubman', 'Countryman', 'Cabrio'];
                        case 'Chevrolet':
                            return ['Cammaro', 'Corvette'];
                    }
                }

                function cambiarLogo() {
                    var marcaSeleccionada = marcaSelect.value;

                    var logos = {
                    "Volkswagen": 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Volkswagen_Logo_till_1995.svg/2048px-Volkswagen_Logo_till_1995.svg.png',
                    "BMW":"https://stick-attack.fr/23926-large_default/stickers-logo-bmw-couleurs.jpg",
                    "Mercedes-Benz":"https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/2048px-Mercedes-Logo.svg.png",
                    "Audi":"https://www.rentacarfloridacars.com/wp-content/uploads/2016/12/Audi-Logo-2013.png",
                    "Ford":"https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Ford_Motor_Company_Logo.svg/2560px-Ford_Motor_Company_Logo.svg.png",
                    "Porsche":"https://logos-world.net/wp-content/uploads/2021/04/Porsche-Logo.png",
                    "Ferrari":"https://i.pinimg.com/originals/ae/db/ae/aedbaebd3b32e25585970765a86cbe22.png",
                    "Toyota":"https://logotipoz.com/wp-content/uploads/2022/11/toyota-logo-vector.png",
                    "Honda":"https://www.pngmart.com/files/1/Honda-Logo-PNG.png",
                    "Renault":"https://cdn.cookielaw.org/logos/1058e0b9-ee95-4d43-8292-3dae40ce5c3c/903e2d1c-4b45-44eb-a67d-70bb644cc381/1e201975-19cd-4a3d-b0c3-7bbe1a2fb964/renault.png",
                    "Mini":"https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/MINI_logo.svg/1200px-MINI_logo.svg.png",
                    "Chevrolet":"https://1000marcas.net/wp-content/uploads/2020/01/Chevrolet-logo.png"                
                };

                    var urlLogo = logos[marcaSeleccionada];

                    logoInput.value = urlLogo;

                    var changeEvent = new Event('change');
                    urlInput2.dispatchEvent(changeEvent);
                }

            </script>

    </body>
</html>