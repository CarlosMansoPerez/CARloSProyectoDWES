<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio - CARloS</title>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <script src="https://kit.fontawesome.com/757ec8dbf6.js" crossorigin="anonymous"></script>

</head>
<body id="bodyLanding">

    <div id="nav">
        <a href="/"><img id="logo" src="{{asset('img/LogoCarlos.png')}}" alt=""></a>
        <p></p>
        <p id="titulo"><b>CAR</b>lo<b>S</b></p>
        <p id="login" onclick="ventanaLogin()"><i class="fa-solid fa-user"></i></p>

        <div id="ventana">
            <p id="cerrar" onclick="cerrarVentana()">X</p>
            <a href="login"><p>Inicio de sesión</p></a>
            <a href="usuario/registrar"><p>Registro</p></a>
        </div>

    </div>

    <div  id="galeria">
        <section>

            <img onmouseover="sonido()"  onmouseout="quitasonido()" src="{{asset('img/interioBMW.jpg')}}" alt="">

            <img onmouseover="sonido2()" onmouseout="quitasonido2()" src="{{asset('img/audiR8.jpg')}}" alt="">

            <img onmouseover="sonido3()" onmouseout="quitasonido3()"  src="{{asset('img/porsche911.jpg')}}" alt="">

            <img onmouseover="sonido4()" onmouseout="quitasonido4()" src="{{asset('img/bmwBlanco.jpg')}}" alt="">

        </section>

        <audio id="audio1">
            <source src="{{asset('sounds/arrancar.mp3')}}" type="audio/mp3">
        </audio>

        <audio id="audio2">
            <source src="{{asset('sounds/sonido.mp3')}}" type="audio/mp3">
        </audio>

        <audio id="audio3">
            <source src="{{asset('sounds/sonido2.mp3')}}" type="audio/mp3">
        </audio>

        <audio id="audio4">
            <source src="{{asset('sounds/sonido3.mp3')}}" type="audio/mp3">
        </audio>
    </div>

    <div id="seccion">
        <a href="login"><p>Vehículos Nuevos</p></a>
        <a href="login"><p>Vehículos De Ocasión</p></a>
        <a href="login"><p>Accesorios</p></a>
    </div>

    <div id="divFotosHover">
        <article id="uno">
            <img src="{{asset('img/camaro2.jpg')}}" alt="">
            <img src="{{asset('img/camaro.avif')}}" alt="">
        </article>

        <article id="dos">
            <img src="{{asset('img/porsche911-2.jpg')}}" alt="">
            <img src="{{asset('img/porsche911-2.1.png')}}" alt="">
        </article>

        <article id="tres">
            <img src="{{asset('img/bmwSerie2.jpg')}}" alt="">
            <img src="{{asset('img/bmwSerie2-2.png')}}" alt="">
        </article>
    </div>

    <div id="siguenos">
        <p id="sigue">Síguenos en nuestras redes</p>
    </div>

    <div id="redes">
        <div class="card">
            <p><span><a href="https://www.tiktok.com"><img class="redes" src="{{asset('img/tiktok.png')}}" alt=""></a></span></p>
            <p><span><a href="https://www.twitter.com"><img class="redes" src="{{asset('img/twitter.png')}}" alt=""></a></span></p>
            <p><span><a href="https://www.youtube.com"><img class="redes" src="{{asset('img/yt.svg')}}" alt=""></a></span></p>
            <p><span><a href="https://www.instagram.com"><img class="redes" src="{{asset('img/ig.png')}}" alt=""></a></span></p>
        </div>

    </div>

    <script>
        var ventana = document.getElementById("ventana");
        function ventanaLogin(){
            ventana.style.display="block";
            ventana.style.opacity="1";
        }

        var cerrar = document.getElementById("cerrar");
        function cerrarVentana(){
            ventana.style.opacity="0";
            ventana.style.display="none";
        }

        function sonido(){
            const audio = document.getElementById("audio1");
            audio.play();
        }

        function sonido2(){
            const audio = document.getElementById("audio2");
            audio.play();
        }
        
        function sonido3(){
            const audio = document.getElementById("audio3");
            audio.play();
        }

        function sonido4(){
            const audio = document.getElementById("audio4");
            audio.play();
        }

        function quitasonido(){
            var audio = document.getElementById("audio1");
            audio.pause();
        }
        
        function quitasonido2(){
            var audio = document.getElementById("audio2");
            audio.pause();
        }

        function quitasonido3(){
            var audio = document.getElementById("audio3");
            audio.pause();
        }

        function quitasonido4(){
            var audio = document.getElementById("audio4");
            audio.pause();
        }
    </script>
</body>
</html>