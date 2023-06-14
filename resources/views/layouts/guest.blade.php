<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .cajaLogin{
                left: 20px !important;
            }
            @media (max-width: 1250px) {
                .tituloLogin{
                    font-size: 5rem !important;
                    left: 0% !important;
                    left: 23% !important; 
                    top: 0 !important;
                }
                .loTitulo{
                    font-size: 3rem !important;
                }
                .cajaLogin{
                    margin: auto !important;
                    left: 0 !important;
                    height: auto !important;
                    width: 80% !important;
                }
                .sinCuenta{
                    top: 88% !important;
                    left: 10% !important;
                }
                form{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }
                form div{
                    margin-bottom: 1% !important;
                }
                form button{
                    left: 0 !important;
                    position: none;
                }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        
        <div class="min-h-screen flex flex-col sm:justify-center justify-center items-center pt-6 sm:pt-0 " style="background-image:url('{{asset("/img/cocheFondo.jpg")}}');background-size:cover;height:200px;width:100%;background-position:0px;background-repeat:none">
            <p class="text-white text-xl sinCuenta" style="position:absolute; top:75%; left:6%;">¿Aún no tienes cuenta? <a class="text-white hover:text-black hover:scale-105 font-bold duration-700" style="text-shadow:2px 2px 1px rgb(190, 0, 0);cursor:pointer;" href="{{route('usuarios.insertar')}}">Registrarse</a></p>
            <div>
                <h1 class="hover:scale-105 duration-700 text-center text-red-700 tituloLogin" style="position:absolute; top: -7%;left:45%;font-size:13rem;text-shadow:12px 12px 12px black;font-family:impact;">CAR<b class="font-serif text-black loTitulo" style="font-size:9rem;text-shadow: 1px 1px 1px rgb(64, 64, 64)">lo</b>S</h1>            
            </div>

            <div style="width: 100%">
                <div class="w-full sm:max-w-md px-6 py-8 bg-black shadow-md overflow-hidden sm:rounded-lg cajaLogin ml-12 mb-12" style="height:25rem;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
