<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <script src="{{asset('js/scripts.js')}}"></script>
    <title>Landing Page - CARloS</title>
</head>
<body id="bodyWelcome">
    <div id="container">

        <video autoplay muted preload loop id="videoFondo">
            <source src="{{asset('Video/videoCocheLanding.mp4')}}" type="video/mp4">
        </video>

        <a href="Inicio"><span id="bienvenida">Encuentra tu deportivo</span></a>

        <h1>CAR<b class="letraPequeña">lo</b>S</h1>

    </div>
    <script>
        setTimeout(function(){
            document.body.classList.add("animar");
            setTimeout(function(){
            window.location.href = "Inicio";
        }, 1000);
        }, 3000);

    </script>
</body>
</html>
