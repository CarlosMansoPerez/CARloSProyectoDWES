<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - CARloS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>
<body id="content" style="border: 4px solid black;background-color:#f7f7f7;min-height:153.4vh">
    <h1 class="text-8xl text-red-700 font-bold ml-12 mt-12">CAR<b class="font-serif text-black text-6xl">lo</b><b class="font-bold text-red-700">S<b></h1>
    <p class="mt-8 ml-12 text-black font-normal text-lg mb-4">Nº Factura: <?= $_COOKIE["numFac"] ?></p>

    <div  class="flex flex-row justify-start items-start text-black" >

        <div class="flex flex-col justify-center items-start text-black" style="height: 20rem;margin-left:10%">
            <p class="mt-2 ml-4 text-black font-normal text-xl">Facturar a: </p>
            <p id="nombre" class="mt-2 ml-4 text-black font-normal"><?= $_POST["nombre"] ?></p>
            <p id="correo" class="mt-2 ml-4 text-black font-normal"><?= $_POST["email"] ?></p>
            <p id="direccion" class="mt-2 ml-4 text-black font-normal"><?= $_POST["direccion"] ?></p>
        </div>

        <div class="flex flex-col justify-center items-start text-black" style="height: 20rem;margin-left:20%">
            <p class="mt-2 ml-4 text-black font-normal text-xl">CARloS</p>
            <p class="mt-2 ml-4 text-black font-normal">Carlos Manso Pérez</p>
            <p class="mt-2 ml-4 text-black font-normal">carlosmansoperez2@gmail.com</p>
            <p class="mt-2 ml-4 text-black font-normal">Calle Cita, nº 22, Marbella (Málaga)</p>
        </div>

    </div>

    <p class="mt-5 ml-12 text-black font-normal text-lg mb-6">Fecha de entrega aproximada: <b id="fecha"><?= date('d/m/Y', strtotime('+9 days')) ?></b></p>


    <div class="bg-gray-400 text-black font-normal text-3xl p-4" style="margin-top: 16rem;">
        <p class="ml-10 text-right mr-12">Total a pagar: <b id="total"><?=$_POST["total"]?></b>€</p>
    </div>

    <p class="text-center mt-5 text-black font-normal"  style="margin-top: 6rem;">Gracias por confiar en CARloS</p>
    <p class="text-center mt-5 text-black font-normal mb-5">640 72 77 52 | Calle Cita, nº 22, Marbella (Málaga) | carlosmansoperez2@gmail.com</p>



    <script>
document.addEventListener('DOMContentLoaded', function() {

    let destinatario = document.getElementById("correo").innerText;
    let nombre = document.getElementById("nombre").innerText;
    let fechaEntrega = document.getElementById("fecha").innerText;
    let direccion = document.getElementById("direccion").innerText;
    let total = document.getElementById("total").innerText;

    (function() {
    emailjs.init('dg6qS_gP89UrWSMJC');
    })();

    var templateParams = {
        destinatario: destinatario,
        nombre: nombre,
        fechaEntrega: fechaEntrega,
        direccion: direccion,
        total: total,
    };
    
    emailjs.send('service_f5hs41i', 'template_wib6zjs', templateParams)
        .then(function(response) {
        console.log('SUCCESS!', response.status, response.text);
        }, function(error) {
        console.log('FAILED...', error);
        });

        emailjs.send("service_f5hs41i", "template_wib6zjs", templateParams, "dg6qS_gP89UrWSMJC");




    
    // FACTURA

    var cookie = getCookie('numFac');

    if (cookie) {
    cookie = parseInt(cookie) + 1;
    } else {
    cookie = 230600;
    }

    document.cookie = 'numFac=' + cookie;

    function getCookie(name) {
    var cookieName = name + '=';
    var cookieArray = document.cookie.split(';');
    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
        return cookie.substring(cookieName.length, cookie.length);
        }
    }
    }

    const element = document.querySelector('#content'); 

    const options = {
        margin: [0, 0, 0, 0],
        filename: 'Factura - CARloS.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' } 
    };

    html2pdf().set(options).from(element).save();
});
</script>

</body>
</html>