<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CARloS') }} @yield("section", "- Coches")</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

        
        <style>

            @media (max-width: 1250px) { 
                .divRegistro{
                    width: 100% !important;
                }
                #formRegistro{
                    gap: 0 !important;
                }
                body{
                    background-color: black !important;
                    margin-bottom: 2%;
                }
            }
        </style>
    </head>
    <body class="font-sans" style="margin:0; padding:0; background-color: #333333;">

        <div style="width:100%;height:100vh;background-image:url('{{asset("img/cocheRegistro.jpg")}}');background-size:cover;" class="fotoFondoRegistro">

            <div class="divRegistro shadow-lg bg-black shadow-black" style="width:40%;height:100%;float:left;" >

                <div>
                    <p class="text-white text-6xl text-center mt-6" style="font-family:impact;">Registro <br><b class="text-red-700 text-8xl">CAR</b>lo<b class="text-red-700 text-8xl">S</b></p>

                    <form action="{{route('usuarios.guardar')}}" class="flex justify-center flex-col items-center mt-12" method="post">
                        @csrf

                        <div id="formRegistro" class="flex flex-wrap flex-row justify-center items-center gap-12 ">

                            <div class="flex flex-wrap flex-col justify-center items-center">
                                <input id="nombre"        class="mt-6 text-center w-60 mb-4" name="nombre"   type="text"     placeholder="Nombre" required>
                                <input id="email"         class="mt-6 text-center w-60 mb-4" name="email"    type="email"    placeholder="Correo electrónico" required>
                                <input id="password"      class="mt-6 text-center w-60 mb-4" name="password" type="password" placeholder="Contraseña" minlength="4" required>
                                <span id="password-error" class="text-red-500 bg-white" style="height: 5px"></span>
                                <i id="iconoOjo"          class="bi bi-eye text-black" style="position: absolute;top:58%;left:16%"></i>
                                <input id="numTel"        class="mt-6 text-center w-60 mb-4" name="numeroTelefono" type="text" placeholder="Nº teléfono" maxlength="9" minlength="9" required >
                            </div>

                            <div class="flex flex-wrap flex-col justify-center items-center">
                                <input id="direccion" class="mt-6 text-center w-60 mb-4" name="direccionEnvio" type="text" placeholder="Direccion de Envio" required>
                                <input id="provincia" class="mt-6 text-center w-60 mb-4" name="provincia" type="text" placeholder="Provincia" required>
                                <input id="ciudad" class="mt-6 text-center w-60 mb-4" name="ciudad" type="text" placeholder="Ciudad" required>
                                <input id="cp" class="mt-6 text-center w-60 mb-4" name="cp" type="text" placeholder="Código Postal" required maxlength="5" minlength="5">
                            </div>

                        
                        </div>
                        <p><button type="submit" class="bg-red-700 hover:bg-white text-white mt-4 hover:text-red-700 hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded">REGISTRARSE</button>
                        <a id="usuarioAleatorio" class="bg-white hover:bg-red-700 text-red-700 mt-4 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded">Usuario Aleatorio</a></p>
                    </form>
<br><br>
                    <p class="text-white text-md ml-2 text-center hover:text-white">¿Ya tienes cuenta en <b class="text-red-700 text-lg">CAR</b>lo<b class="text-red-700 text-lg">S</b>? <br>Inicia sesión <a href="{{route('login')}}" class="text-red-700 font-bold hover:scale-105 hover:text-white duration-700">aquí</a></p>


                </div>
    
            </div>


        </div>

        <script>
            //NOMBRE Y CORREO 
            var inputCorreo = document.getElementById("email");
            var inputNombre = document.getElementById("nombre");
            document.getElementById("usuarioAleatorio").addEventListener("click", correo);

            function correo(){
                fetch("https://api.generadordni.es/v2/person/username")
                .then(response => response.json())
                .then(data => {
                    let valorNombre=data[0].split("_");
                    inputNombre.value=valorNombre[0];
                    inputCorreo.value=data[0]+"@gmail.com";
                })
                .catch(error => {
                    console.log('Error en la solicitud:', error);
                });
            }

            // Nº TELEFONO ALEATORIO
            var inputTelefono = document.getElementById("numTel");
            document.getElementById("usuarioAleatorio").addEventListener("click", telefono);

            function telefono(){
                fetch("https://api.generadordni.es/v2/misc/phonenumber")
                .then(response => response.json())
                .then(data => {
                    inputTelefono.value=data[0];
                })
                .catch(error => {
                    console.log('Error en la solicitud:', error);
                });
            }

            // CODIGO POSTAL
            var inputCp = document.getElementById("cp");
            document.getElementById("usuarioAleatorio").addEventListener("click", cp);

            function cp(){
                fetch("https://api.generadordni.es/v2/misc/zipcode")
                .then(response => response.json())
                .then(data => {
                    inputCp.value=data[0];
                })
                .catch(error => {
                    console.log('Error en la solicitud:', error);
                });
            }

            // CIUDAD
            var inputCiudad = document.getElementById("ciudad");
            document.getElementById("usuarioAleatorio").addEventListener("click", ciudad);

            function ciudad(){
                fetch("https://api.generadordni.es/v2/misc/city")
                .then(response => response.json())
                .then(data => {
                    inputCiudad.value=data[0];
                })
                .catch(error => {
                    console.log('Error en la solicitud:', error);
                });
            }

            // DIRECCION
            var inputDireccion = document.getElementById("direccion");
            document.getElementById("usuarioAleatorio").addEventListener("click", direccion);
            let numAleat = Math.floor(Math.random() * 45) + 1;

            function direccion(){
                fetch("https://api.generadordni.es/v2/text/characters?results=4&characters=16")
                .then(response => response.json())
                .then(data => {
                    inputDireccion.value="Calle "+data[0]+" nº "+ numAleat;
                })
                .catch(error => {
                    console.log('Error en la solicitud:', error);
                });
            }

            //VISIBILIDAD CONTRASEÑA

            document.getElementById("iconoOjo").addEventListener("click", verPassword)
            function verPassword() {
                var inputPassword = document.getElementById("password");
                var iconoOjo = document.getElementById("iconoOjo");
                
                if (inputPassword.type === "password") {
                    inputPassword.type = "text";
                } else {
                    inputPassword.type = "password";
                }
            }

            // VALIDACIÓN CONTRASEÑA
            var inputPassword = document.getElementById("password");
            document.getElementById("password").addEventListener("change", validarInputPassword);

            function validarInputPassword() {
                var patron = /^(?=.*\d)(?=.*[A-Z]).{6,}$/;  // Expresión regular para verificar que solo haya 5 números

                if (!patron.test(inputPassword.value)) {
                    inputPassword.value = "";

                    Swal.fire({ // librería para alerta de errores importada en la cabecera
                        title: 'Error',
                        text: 'La contraseña debe tener al menos 6 caracteres, 1 número y 1 mayúscula',
                        icon: 'error',
                        background: 'white',
                    });
                }
            }

            // VALIDACIONES INPUTS

            // Código postal
            var inputCp = document.getElementById("cp");
            document.getElementById("cp").addEventListener("change", validarInput);

            function validarInput() {
                var patron = /^\d{5}$/;  // Expresión regular para verificar que solo haya 5 números

                if (!patron.test(inputCp.value)) {
                    inputCp.value = "";

                    Swal.fire({ // librería para alerta de errores importada en la cabecera
                        title: 'Error',
                        text: 'El código postal debe ser un número de 5 dígitos',
                        icon: 'error',
                        timer: "2000"
                    });
                }
            }


            // Número teléfono
            var inputNumTel = document.getElementById("numTel");
            document.getElementById("numTel").addEventListener("change", validarInput2);

            function validarInput2() {
                var patron = /^\d{9}$/;  // Expresión regular para verificar que solo haya 5 números

                if (!patron.test(inputNumTel.value)) {
                    inputNumTel.value = "";

                    Swal.fire({ // librería para alerta de errores importada en la cabecera
                        title: 'Error',
                        text: 'El número de teléfono debe ser un número de 9 dígitos',
                        icon: 'error',
                        timer: "2000"
                    });
                }
            }

            // Email
            var inputEmail = document.getElementById("email");
            document.getElementById("email").addEventListener("change", validarInput3);

            function validarInput3() {
                var patron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;  // Expresión regular para verificar que solo haya 5 números

                if (!patron.test(inputEmail.value)) {
                    inputEmail.value = "";

                    Swal.fire({ // librería para alerta de errores importada en la cabecera
                        title: 'Error',
                        text: 'Introduce un correo electrónico válido',
                        icon: 'error',
                        timer: "2000"
                    });
                }
            }


        </script>
    </body>
</html>