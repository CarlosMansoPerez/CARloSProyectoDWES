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
        
    </head>
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333;">

        <div style="width:100%;height:100vh;background-image:url('{{asset("img/cocheRegistro.jpg")}}');background-size:cover;">

            <div class=" shadow-lg bg-black shadow-black" style="width:40%;height:100%;float:left;" >

                <div>
                    <p class="text-white text-6xl text-center mt-6" style="font-family:impact;">Registro <br><b class="text-red-700 text-8xl">CAR</b>lo<b class="text-red-700 text-8xl">S</b></p>

                    <form action="{{route('usuarios.guardar')}}" class="flex justify-center flex-col items-center mt-12" method="post">
                        @csrf

                            <input class="mt-6 text-center w-60 mb-4" name="nombre"   type="text"     placeholder="Nombre">
                            <input class="mt-6 text-center w-60 mb-4" name="email"    type="email"    placeholder="Correo electrónico">
                            <input class="mt-6 text-center w-60 mb-4" name="password" type="password" placeholder="Contraseña">

                        <button type="submit" class="bg-red-700 hover:bg-white text-white mt-4 hover:text-red-700 hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded">REGISTRARSE</button>
                    </form>
<br><br>
                    <p class="text-white text-md ml-2 text-center hover:text-white">¿Ya tienes cuenta en <b class="text-red-700 text-lg">CAR</b>lo<b class="text-red-700 text-lg">S</b>? <br>Inicia sesión <a href="{{route('login')}}" class="text-red-700 font-bold hover:scale-105 hover:text-white duration-700">aquí</a></p>


                </div>
    
            </div>


        </div>

    </body>
</html>