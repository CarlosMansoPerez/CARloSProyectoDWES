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
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <style>
            @media (max-width: 850px) {
                .navBar{
                    width: 30% !important;
                }
                #divFiltros{
                    display: none;
                }
                #tituloArriba{
                    font-size: 5rem !important;
                    margin-left: -5% !important;
                    margin-top: -15% !important;
                }
                #loTitulo{
                    font-size: 4rem !important;
                }
                #vermasMain{
                    display: none;
                }
                nav{
                    width:100% !important;
                    font-size: .6rem !important;
                }
                nav>a{
                    margin: 2% !important;
                    margin-left: 4% !important;
                }
                #divSalir{
                    width:5% !important;
                }
                .pequeño{
                    width: 10%;
                    font-size: .6rem !important;
                    margin-left: 1%;
                }
                .cards{
                    width: 85% !important;
                    margin-left: 7% !important;
                }
                #saludo{
                    display: none;
                }
                #carrito{
                    font-size: 1rem; 
                }
                #datosCoche{
                    flex-direction: column !important;
                }
                #datosCoche>div{
                    width: 80% !important;
                    margin: 0 !important;
                }
                #datosCoche>div>img{
                    width: 100% !important;
                    height: auto !important;
                }
                #datosCoche>div>p{
                    width: 100% !important;
                    font-size: 1rem;
                }
                .datos{
                    width: 80% !important;
                    font-size: 1.2rem !important;
                }
                .datos p :not(.precio){
                    font-size: 1.5rem !important;
                }
                .datos>div{
                    align-items: flex-start !important;
                    margin-left: 0 !important;
                    margin-top: 2rem !important;
                }
                .datos>div>div{
                    margin-right: 0 !important;
                }
                #caracteristicasCoche{
                    width: 80% !important;
                }
                .combustible{
                    margin-top: 2rem;
                }
                .precio{
                    font-size: 3rem !important;
                }
                .divTodasValoraciones{
                    width: 100% !important;
                    flex-direction: column-reverse !important;
                    justify-content: center !important;
                    align-items: center !important;
                }
                hr{
                    display: none;
                }
                .divTodasValoraciones div{
                    width: 80% !important;
                }
                .cajonValoracion{
                    flex-direction: column !important;
                }
                .cajonValoracion form{
                    width: 80% !important;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                textarea{
                    width: 80% !important;
                }
                #enviatBtn{
                    margin-left: 10% !important;   
                }
                #valoracionesContainer>div{
                    width: 100% !important;
                }
                #valoracionesContainer>div div{
                    width: 100% !important;
                }
                #valoracionDiv{
                    width: 100% !important;
                    text-align: center;
                    flex-direction: column !important;
                    justify-content: center !important;
                }
                #valoracionDiv div{
                    justify-content: center !important;
                }
            }
        </style>
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

            <div id="datosCoche" class="flex flex-wrap justify-left items-center flex-row" style="width: 100%;padding-bottom:1.7rem;background: linear-gradient(#000000, #333333);">

                {{-- FOTO --}}
                <div class="w-7/12 fotoCoche" style="margin-left: 5%; margin-top:2%;">
                    <img class="w-full" style="height: 30rem" src="{{$imagen->foto}}">
                    <?php
                        $mediaRedondeada = round($mediaValoraciones->mediaValoraciones);
                        if($mediaRedondeada != 0){
                        $estrellas = "";

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $mediaRedondeada) {
                                // Estrella amarilla
                                $estrellas .= '<i class="bi bi-star-fill text-yellow-300" style="text-shadow:1px 1px 1px orange"></i>';
                            } else {
                                // Estrella vacia
                                $estrellas .= '<i class="bi bi-star"></i>';
                            }
                        }

                    ?>
                    <p style="margin-top:8%" class="text-3xl text-center text-white font-bold"><?php echo $estrellas ?> <b class="font-normal">( {{$mediaValoraciones->totalRegistros}} )</b></p>
                    <?php } ?>
                </div>

                {{-- DATOS --}}
                <div class="datos p-3 flex justify-center flex-col items-center text-center w-3/12" style="margin-left: 6%">

                    <div class="flex flex-wrap justify-center items-center flex-row mb-5" style="margin-left: -4rem; margin-top:4rem;">
                        <div class="mr-3">
                            <img src="{{$imagen->logo}}" style="width:6rem;height: 4rem;margin-bottom:2rem">
                        </div>
                        <div>
                            <p class="text-5xl text-white font-bold">{{$imagen->marca}}</p>
                            <p class="text-5xl text-red-700 font-bold" style="margin-left: -1rem">{{$imagen->modelo}}</p>
                        </div>
                    </div>
                    

                    <div id="caracteristicasCoche" class="flex flex-row justify-center items-center" style="margin-top: 3rem">

                        <div class="flex flex-col justify-center items-center mr-5" style="width: 12rem; min-height:12rem;">
                            <p class="text-white text-2xl mb-1">Matriculado en</p> 
                            <p class="text-3xl text-white font-bold" style="margin-bottom: 2rem">{{$imagen->anio_matriculacion}}</p>

                            <p class="text-white text-2xl mb-1">Potencia CV</p> 
                            <p class="text-3xl text-white font-bold" style="margin-bottom: 2rem">{{$imagen->potencia}}</p>

                        </div>

                        <div class="flex flex-col justify-center items-center ml-5" style="width: 12rem; min-height:12rem;">
                            <p class="text-white text-2xl mb-1">Kilómetros</p> 
                            <p class="text-3xl text-white font-bold" style="margin-bottom: 2rem">{{$imagen->kilometros}}</p>

                            <p class="text-white text-2xl mb-1 combustible">Combustible</p> 
                            <p class="text-3xl text-white font-bold" style="margin-bottom: 2rem">{{$imagen->combustible}}</p>

                        </div>

                    </div>

                    <p class="text-red-700 font-bold hover:scale-105 hover:text-white duration-700 mt-5 precio" style="font-size: 5rem;">{{$imagen->precio}}€</p>

                    <form action="{{route('carrito.agregar')}}" method="POST">
                        @csrf

                            <input type="hidden" value="<?= $imagen->idCoc ?>" name="idCoche">
                            <input type="hidden" value="<?= auth()->user()->idUsu ?>" name="idUsu">

                            <button type="submit" class="bg-red-700 hover:bg-black duration-700 hover:scale-105 text-white font-bold rounded px-3 py-1 mt-12 pb-2 pt-2 text-xl" style="width:200%; margin-left:-35%;">AÑADIR <i class="bi bi-cart3"></i></button>
                        
                        </form>

                </div>
            </div>

            @if (count($valoraciones) != 0)

            

            <div class="flex flex-row justify-around items-start flex-wrap py-5 divTodasValoraciones" style="background: linear-gradient(#333333, #000000);">

                <div id="valoracionesContainer" class="flex flex-col justify-center items-center flex-wrap py-5 mt-10" style="width: 50%">

                    @foreach ($valoraciones as $valoracion)
                    <div class="flex flex-col justify-start items-start flex-wrap pt-3 bg-black text-white mb-10" style="width:100%;height:auto;box-shadow:1px 1px 4px rgb(79, 79, 79)">

                        <div id="valoracionDiv" class="flex flex-row justify-between items-start flex-wrap" style="width:100%">

                            <div class="flex flex-row justify-start items-start flex-wrap mb-2">
                                <p class="ml-5">{{$valoracion->nombre}}</p>
                                <p class="ml-2 text-red-700">{{$valoracion->email}}</p>
                            </div>

                            <div  class="flex flex-row justify-start items-start flex-wrap mr-10">
                                <?php
                                    $maxPuntuacion = 5;
                                    $puntuacion = $valoracion->puntuacion;
                                ?>
                                @for ($i = 1; $i <= $maxPuntuacion; $i++)
                                    @if ($i <= $puntuacion)
                                        <i class="bi bi-star-fill text-yellow-300" style="text-shadow:1px 1px 1px orange"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </div>

                        </div>

                        <div>
                            <p class="ml-6 mt-5 mb-1" style="overflow-wrap: break-word;">{{$valoracion->comentario}}</p>
                        </div>

                        @if (auth()->user()->idUsu == 2 && auth()->user()->nombre == "Admin")
                            <div class="flex flex-row justify-around items-center flex-wrap mt-2" style="width: 100%">
                                <a href="{{route('coches.borrarValoracion',[$imagen->idCoc, $valoracion->idVal])}}" class="py-1 bg-red-700 hover:bg-white hover:text-red-700 duration-500 hover:font-bold text-center" style="width:100%">BORRAR <i class="bi bi-trash3-fill"></i></a>
                            </div>
                        @endif

                    </div>
                    @endforeach
                </div>

                <div class="flex flex-col justify-start items-center flex-wrap py-5 mt-10 bg-black text-white cajonValoracion" style="width: 30%;height:auto;border-radius:2%;box-shadow:1px 1px 4px rgb(79, 79, 79)">

                    <p class="font-bold text-2xl">Danos tu valoración</p>
                    <hr style="background-color: black; width:100%;height:3px" class="mt-3">
                    <form id="valoracionForm">
                        @csrf
                        <div class="flex flex-col justify-center items-center flex-wrap">
                            <p class="text-red-700 font-bold text-xl mt-10 mb-3">Puntuación</p>
                            <div id="puntuacionEstrellas" class="flex flex-row justify-center items-center flex-wrap text-2xl">
                                <i class="bi bi-star star" data-value="1"></i>
                                <i class="bi bi-star star" data-value="2"></i>
                                <i class="bi bi-star star" data-value="3"></i>
                                <i class="bi bi-star star" data-value="4"></i>
                                <i class="bi bi-star star" data-value="5"></i>
                            </div>
                            <input type="hidden" name="puntuacion" id="puntuacion" value="0">
                        </div>
                    
                        <div class="flex flex-col justify-center items-center flex-wrap text-2xl mt-8">
                            <p class="text-red-700 font-bold text-xl mb-3 ml-1">Comentario</p>
                            <textarea class="text-black" name="comentario" id="comentario" cols="35" rows="1" placeholder="El {{$imagen->marca}} {{$imagen->modelo}} ..." required></textarea>
                        </div>
                    
                        <input type="hidden" name="idCoc" value="{{$imagen->idCoc}}">
                    
                        <div class="flex flex-col justify-center items-center flex-wrap">
                            <button type="button" id="enviarBtn" class="bg-red-700 hover:bg-white duration-700 hover:scale-105 text-white hover:text-red-700 font-bold rounded px-3 py-1 mt-12 pb-2 pt-2 text-xl">ENVIAR</button>
                        </div>
                    </form>
                </div>

            </div>

            @else

            <div class="flex flex-col justify-end items-center flex-wrap mb-10">
                <div class="flex flex-col justify-start items-center flex-wrap py-5 mt-10 bg-black text-white" style="width: 30%;height:auto;border-radius:2%;box-shadow:1px 1px 4px rgb(79, 79, 79)">

                    <p class="font-bold text-2xl">Danos tu valoración</p>
                    <hr style="background-color: black; width:100%;height:3px" class="mt-3">
                    <form action="{{route("coches.valoracion")}}" method="POST">
                    @csrf
                        <div class="flex flex-col justify-center items-center flex-wrap">
                            <p class="text-red-700 font-bold text-xl mt-10 mb-3">Puntuación</p>
                            <div id="puntuacionEstrellas" class="flex flex-row justify-center items-center flex-wrap text-2xl">
                                <i class="bi bi-star star" data-value="1"></i>
                                <i class="bi bi-star star" data-value="2"></i>
                                <i class="bi bi-star star" data-value="3"></i>
                                <i class="bi bi-star star" data-value="4"></i>
                                <i class="bi bi-star star" data-value="5"></i>
                            </div>
                            <input type="hidden" name="puntuacion" id="puntuacion">
                        </div>

                        <div class="flex flex-col justify-center items-center flex-wrap text-2xl mt-8">
                            <p class="text-red-700 font-bold text-xl mb-3 ml-1">Comentario</p>
                            <textarea class="text-black" name="comentario" id="comentario" cols="35" rows="5" placeholder="El {{$imagen->marca}} {{$imagen->modelo}} ..."></textarea>
                        </div>

                        <input type="hidden" name="idCoc" value="{{$imagen->idCoc}}">

                        <div class="flex flex-col justify-center items-center flex-wrap">
                            <button type="submit" class="bg-red-700 hover:bg-black duration-700 hover:scale-105 text-white font-bold rounded px-3 py-1 mt-12 pb-2 pt-2 text-xl">ENVIAR</button>
                        </div>

                    </form>
                </div>
            </div>

            @endif

            <script>

                // ESTRELLAS PARA VALORACIÓN
                var stars = document.querySelectorAll('.star');
                var puntuacionInput = document.querySelector('#puntuacion');
            
                stars.forEach(star => {
                    star.addEventListener('click', function () {
                        var value = this.dataset.value;
            
                        stars.forEach(star => {
                            if (star.dataset.value <= value) {
                                star.classList.remove('bi-star');
                                star.classList.add('bi-star-fill', 'text-yellow-300', 'star-filled');
                            } else {
                                star.classList.remove('bi-star-fill', 'text-yellow-300', 'star-filled');
                                star.classList.add('bi-star', 'star');
                            }
                        });
            
                        puntuacionInput.value = value;
                    });
                });

                stars.forEach(star => {
                    star.addEventListener('mouseover', function () {
                        var value = this.dataset.value;
            
                        stars.forEach(star => {
                            if (star.dataset.value <= value) {
                                star.classList.remove('bi-star');
                                star.classList.add('bi-star-fill', 'text-yellow-300', 'star-filled');
                            } else {
                                star.classList.remove('bi-star-fill', 'text-yellow-300', 'star-filled');
                                star.classList.add('bi-star', 'star');
                            }
                        });
            
                        puntuacionInput.value = value;
                    });
                });

                // VALORACIONES CON AJAX
                $(document).ready(function() {
                    $('#enviarBtn').click(function(e) {
                        e.preventDefault();
                        
                        // Obtengo los valores del formulario
                        var puntuacion = $('#puntuacion').val();
                        var comentario = $('#comentario').val();
                        var idCoc = $('input[name="idCoc"]').val();
                        
                        // Envio los datos al controlador
                        $.ajax({
                            url: "{{ route('coches.valoracion') }}",
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                puntuacion: puntuacion,
                                comentario: comentario,
                                idCoc: idCoc
                            },
                            success: function(response) {
                                // Actualizo la vista con los datos insertados
                                var valoracion = response.valoracion; 

                                // Creo el HTML para insertarlo en el DOM
                                var html = '<div class="flex flex-col justify-start items-start flex-wrap pt-3 bg-black text-white mb-10" style="width:100%;height:auto;box-shadow:1px 1px 4px rgb(79, 79, 79)">' +
                                    '<div id="valoracionDiv" class="flex flex-row justify-between items-start flex-wrap" style="width:100%">' +
                                    '<div class="flex flex-row justify-start items-start flex-wrap mb-2">' +
                                    '<p class="ml-5">' + valoracion.nombre + '</p>' +
                                    '<p class="ml-2 text-red-700">' + valoracion.email + '</p>' +
                                    '</div>' +
                                    '<div class="flex flex-row justify-start items-start flex-wrap mr-10">';
                                
                                var maxPuntuacion = 5;
                                var puntuacion = valoracion.puntuacion;
                                
                                for (var i = 1; i <= maxPuntuacion; i++) {
                                    if (i <= puntuacion) {
                                        html += '<i class="bi bi-star-fill text-yellow-300" style="text-shadow:1px 1px 1px orange"></i>';
                                    } else {
                                        html += '<i class="bi bi-star"></i>';
                                    }
                                }
                                
                                html += '</div>' +
                                    '</div>' +
                                    '<div>' +
                                    '<p class="ml-6 mt-5 mb-1" style="overflow-wrap: break-word;">' + valoracion.comentario + '</p>' +
                                    '</div>';
                                
                                // Lo añado al div de las valoraciones
                                $('#valoracionesContainer').append(html);
                            },
                            error: function(xhr, status, error) {
                                // Manejar errores aquí
                                console.error(error);
                            }
                        });

                        // Pongo caja de comentario en blanco
                        document.getElementById("comentario").value = "";
                    });
                });
            </script>
    </body>
</html>