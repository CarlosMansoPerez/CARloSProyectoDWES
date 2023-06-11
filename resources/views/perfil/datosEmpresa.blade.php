@extends("layouts.app")

@section("main")

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
                tr:hover:not(#cabecera){
                background-color: black;
                color: red;
                transition: .1s;
                cursor: pointer;
            }
            .informacion {
                display: none;
                position: absolute;
                left: 38%;
                margin-top: -5%;
                background-color: rgb(0, 0, 0);
                color: white;
                text-align: left;
                width: 25rem;
                padding: .5%;
                border: 4px solid rgb(157, 0, 0);
                z-index: 999;
            }
            nav > div > div > p{
                display: none !important;
            }

            .paginador span{
                color: red;
            }

            .paginador span :hover{
                color: red;
                background-color: black
            }

            .paginador a{
                color: red;
            }

            .paginador a :hover{
                color: red;
                background-color: black
            }

            canvas {
            max-width: 80%;
            max-height: 400px;
            margin: 50 auto;
            color: white;
        }

</style>
<div class="mt-12 flex flex-col justify-center items-center flex-wrap pt-5 bg-white" style="padding-bottom:10%;background: rgb(51,51,51);background: linear-gradient(180deg, rgba(51,51,51,1) 42%, rgba(0,0,0,1) 100%); ">
                
    <div id="resumenVentas" style="width: 100%;margin-top:-4%" class="p-5 mb-8 flex justify-center items-center">
        <p class="text-3xl text-white font-bold">Resumen de ventas</p>
    </div>

    <div class="flex justify-center items-center flex-row" style="width:100%; padding-left:5%">
        <p  class="text-xl text-red-700 font-bold" style="float: left">Llevas {{count($ventasMes)}} <?php if(count($ventasMes) == 1) echo "venta"; else echo "ventas"; ?> este mes</p>
    </div>

    <div class="flex flex-row justify-center items-center flex-wrap" style="width: 100%">

        <table class="mt-5 border-2 text-center text-white text-xl mt-12" style="width: 90%; background-color:gray;">
            <thead class="border-2 bg-black font-bold text-white">
                <tr id="cabecera">
                    <th class="border-2 py-2">Nº de Venta</th>
                    <th class="border-2 py-2">Usuario</th>
                    <th class="border-2 py-2">Marca</th>
                    <th class="border-2 py-2">Modelo</th>
                    <th class="border-2 py-2">Importe</th>
                    <th class="border-2 py-2">Fecha</th>
                </tr>
                </thead>
                <tbody class="border-2">
                    @foreach ($ventas as $venta)
                    <tr>
                        <td class="border-2">{{$venta->idVen}}</td>
                        <td style="width:18rem;" class="border-2">
                            {{$venta->email}}
                            <i style="float: right;" class="bi bi-info-circle-fill text-red-700 pr-5 infoUsu"></i>
                            <div class="informacion">
                                <p>{{ $venta->nombre }}</p>
                                <p>{{ $venta->email }}</p>
                                <p>{{ $venta->numeroTelefono }}</p>
                                <p>{{ $venta->ciudad }}</p>
                                <p>{{ $venta->direccionEnvio }}</p>
                            </div>
                        </td>
                        <td class="border-2">{{$venta->marca}}</td>
                        <td class="border-2">{{$venta->modelo}}</td>
                        <td class="border-2">{{$venta->importe}}€</td>
                        <td class="border-2">{{$venta->fechaCompra}}</td>
                    </tr>
                @endforeach
                
                
                </tbody>
        </table>
    </div>

    <div class="mt-5 mb-12 paginador">
        {{ $ventas->links() }}
    </div>

    <div class="mt-12 flex justify-center items-center flex-col mb-12 pt-12" style="width:100%; border-top:2px solid white;">
        <p class="text-3xl text-white font-bold">Estadísticas de Ventas</p>
    </div>

    <canvas id="canvas" class="mt-12 mb-12"></canvas>


    <div class="mt-12 flex justify-center items-center flex-col" style="width: 100%">

        <div class="flex justify-center items-center p-5" style="width: 100%; border-top:2px solid white">
            <p class="text-3xl text-white font-bold">Datos de interés</p>
        </div>

        <div class="mt-12 flex justify-center items-center flex-col" style="width: 80%;">

            <div class="flex justify-center items-center flex-row" style="border:2px solid white;width:100%">
                <div class="flex justify-center items-center flex-col p-3" style="border: 2px solid white; width:100%">
                    <p class="text-white text-2xl">MARCA MAS VENDIDA</p>
                    <p class="text-red-700 text-3xl mt-2">{{$marcaMasVendida->marca}} ( {{$marcaMasVendida->cantidad_registros}} )</p>
                </div>
                <div class="flex justify-center items-center flex-col p-3" style="border: 2px solid white; width:100%">
                    <p class="text-white text-2xl">COCHE MÁS VENDIDO</p>
                    <p class="text-red-700 text-3xl mt-2">{{$modeloMasVendido->modelo}} ( {{$modeloMasVendido->cantidad_registros}} )</p>
                </div>
            </div>

            <div class="flex justify-center items-center flex-row" style="border:2px solid white;width:100%">
                <div class="flex justify-center items-center flex-col p-3" style="border: 2px solid white; width:100%">
                    <p class="text-white text-2xl">TOTAL GENERADO EN VENTAS</p>
                    <p class="text-red-700 text-3xl mt-2">{{$totalVentas}} €</p>
                </div>
                <div class="flex justify-center items-center flex-col p-3" style="border: 2px solid white; width:100%">
                    <p class="text-white text-2xl">USUARIO MÁS FIEL</p>
                    <p class="text-red-700 text-3xl mt-2">{{$usuarioMasFiel->email}} ( {{$idUsuarioMasFiel->cantidad_registros}} compras )</p>
                </div>
            </div>
            
        </div>

    </div>


</div>

<script>
            // GRAFICA
            var ctx = document.getElementById('canvas').getContext('2d');
        
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["FEBRERO","MARZO", "ABRIL","MAYO", "JUNIO"],
                datasets: [{
                    label: 'Ventas',
                    data: [<?php echo $resultadosVentas["VentasMes4"]; ?>, <?php echo $resultadosVentas["VentasMes3"]; ?>, <?php echo $resultadosVentas["VentasMes2"]; ?>, <?php echo $resultadosVentas["VentasMesPasado"]; ?>, <?php echo $resultadosVentas["VentasMesActual"]; ?>],
                    backgroundColor: 'rgba(255, 0, 0 , 0.5)',
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'x',
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
</script>
@endsection