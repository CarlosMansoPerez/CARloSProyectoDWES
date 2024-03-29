@extends("layouts.app")

@section("main")

<script defer src="{{asset('js/scripts.js')}}"></script>

<style>
    .tooltip-text {
        display: none;
        position: absolute;
        top: 106%;
        left: 83.5%;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        transition: 0.3s;
    }

    @media (max-width: 1250px) {
        #divFiltros{
            width: 70% !important;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            gap: 2%;
            backj
        }
        .filtrado{
            width: 10% !important;
            height: 20% !important;
        }
        .tipoFiltrado{
            width: 20% !important;
            height: 20% !important;
        }
        #compara{
            margin-top: 3% !important;
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
        .navBar{
            margin-top: -25px;
        }
        nav{
            margin-top: 14.5rem !important;
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
    }
</style>

{{------------------------------------------- MENSAJES DE ALERTA ----------------------------------------------}}

    {{-- @if (session('borrarDenegado'))
    <script>
        Swal.fire({ // librería para alerta de errores importada en la cabecera
            title: 'Error',
            text: 'Acceso denegado',
            icon: 'error',
            background: 'white',
        });
    </script>
    @endif --}}

    @if (session('cocheBorrado'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Vehículo eliminado de la base de datos',
        })
    </script>
    @endif

    @if (session('mensajeCocheInsertado'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Vehículo insertado en la base de datos',
        })
    </script>
    @endif

{{--------------------------------------------- FIN MENSAJES DE ALERTA --------------------------------------------}}

    <div id="saludo" class="mt-5" style="margin-left: 5.5%">
        <p class="text-white font-bold font-sans text-2xl">Hola <b class="text-red-700">{{auth()->user()->nombre;}}</b></p>
    </div>

    @empty($datos)

        <div class="bg-red-300">
            No hay datos en la base de datos.
        </div> 

    @else


    @if (auth()->user()->esAdmin == 1)
        <div class="flex justify-center items-center">
            <a href="{{route('coches.insertar')}}" class="bg-white hover:bg-black text-black ml-6 mt-4 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded" style="width:20rem;">INSERTAR NUEVO COCHE</a>
        </div>
    @endif

        {{-- FILTRO --}}
        <div id="divFiltros" class="text-red-700 text-lg mt-3 flex justify-between flex-row items-center" style="margin-left:4rem;width:88%;height:auto;background-color:#333333">

            <div class="flex justify-start">            
                {{-- SELECCIONA FILTRO --}}
                <select name="filtrado" id="filtrado" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer" style="width:10rem;height:3rem;">
                    <option value="" selected disabled>Filtrar por</option>
                    <option value="marcas">Marca</option>
                    <option value="modelos">Modelo</option>
                    <option value="precios">Precio</option>
                    <option value="anios">Año Matriculacion</option>
                    <option value="combustibles">Combustible</option>
                    <option value="kilometros">Kilómetros</option>
                    <option value="potencia">Potencia CV</option>
                </select>
                {{-- MARCA --}}
                <select id="marcas" name="marca" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer tipoFiltrado" style="width:10rem;height:3rem;display:none">
                    <option value=""selected disabled>-</option>
                    @foreach ($marcas as $item)
                        <option value="{{$item->marca}}">{{$item->marca}}</option>
                    @endforeach
                </select>
                {{-- MODELO --}}
                <select id="modelos" name="modelo"  class="ml-5 mt-2 bg-black text-white hover:cursor-pointer tipoFiltrado" style="width:8rem;height:3rem;display:none">
                    <option value=""selected disabled>-</option>
                    @foreach ($modelos as $item)
                        <option value="{{$item->modelo}}">{{$item->modelo}}</option>
                    @endforeach 
                </select>
                {{-- PRECIO --}}
                <select id="precios" name="precio" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer tipoFiltrado" style="width:11rem;height:3rem;display:none">
                    <option value=""selected disabled>-</option>
                    <option value="5000">Menos de 5.000€</option>
                    <option value="10000">Menos de 10.000€</option>
                    <option value="25000">Menos de 25.000€</option>
                    <option value="50000">Menos de 50.000€</option>
                    <option value="100000">Menos de 100.000€</option>
                </select>
                {{-- AÑO MATRICULACION --}}
                    <select id="anios" name="anio" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer tipoFiltrado" style="width:8rem;height:3rem;display:none">
                        <option value="" selected disabled>-</option>
                            <?php for($i=2009;$i<2024;$i++){ ?>
                                <option value="{{$i}}">{{$i}}</option>
                            <?php } ?>
                    </select>
                {{-- COMBUSTIBLE --}}
                <select id="combustibles" name="combustible" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer tipoFiltrado" style="width:10rem;height:3rem;display:none">
                    <option value="" selected disabled>-</option>
                            <option value="Diesel">Diésel</option>
                            <option value="Gasolina">Gasolina</option>
                </select>
                {{-- KILOMETROS --}}
                <select id="kilometros" name="kilometros" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer tipoFiltrado" style="width:11rem;height:3rem;display:none">
                    <option value=""selected disabled>-</option>
                    <option value="10000">Menos de 10.000</option>
                    <option value="25000">Menos de 25.000</option>
                    <option value="50000">Menos de 50.000</option>
                    <option value="100000">Menos de 100.000</option>
                    <option value="150000">Menos de 150.000</option>
                </select>

                {{-- POTENCIA --}}
                <select id="potencia" name="potencia" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer tipoFiltrado" style="width:11rem;height:3rem;display:none">
                    <option value=""selected disabled>-</option>
                    <option value="150">Más de 150 CV</option>
                    <option value="250">Más de 250 CV</option>
                    <option value="300">Más de 300 CV</option>
                    <option value="350">Más de 350 CV</option>
                    <option value="400">Más de 400 CV</option>
                </select>

                {{-- BORRAR FILTROS --}}
                <div id="borrarFiltros" style="width:3rem;height:3rem;background-color:rgb(0, 0, 0);border:1px solid gray" class="ml-5 mt-2 flex justify-center items-center text-2xl hover:cursor-pointer hover:bg-red-700 hover:text-white">
                    <i class="bi bi-trash3-fill"></i>
                </div>

            </div>

            <a  id="compara" href="{{route("coches.comparar")}}">
                <div class="flex flex-row justify-center items-center flex-wrap bg-gray-200  hover:text-white hover:bg-red-700 hover:scale-110 duration-500 hover:font-bold hover:cursor-pointer" style="border: 2px solid black">
                    <div class="flex flex-row justify-center items-center flex-wrap">
                        <img style="width:3rem" src="{{asset("img/iconoCocheVolteado.png")}}" class="mx-1">
                        <b>VS</b>
                        <img style="width:3rem" src="{{asset("img/iconoCoche.png")}}" class="mx-1">
                    </div>
                </div>
                <span id="tooltip" class="tooltip-text">¡COMPARA!</span>
            </a>

        </div>

    @foreach($datos as $coche)

            {{-- CARDS --}}
            <a href="{{route('coches.imagen', $coche->idCoc)}}#datosCoche">

            <div class="filtro rounded float-left shadow-lg mt-12 my-8 bg-gray-200 hover:bg-zinc-300 hover:cursor-pointer hover:scale-105 duration-300 shadow-black cards" style="width: 25rem;height:auto; margin-left: 5.5%;z-index:0;" >

                {{-- CABECERA --}}
                    <div class="font-bold text-2xl mb-1">
                        <div style="float:left">
                            <p class="text-lg  mx-6 font-serif mt-5 ">{{$coche->marca}}</p>
                            <p class="text-2xl mx-6 font-serif">{{$coche->modelo}}</p>
                        </div>
                        <div class="mx-6 mr-9 my-4" style="float: right">
                            <img src="{{$coche->logo}}" style="width:6rem; height:4rem;"/>
                        </div>
                    </div>

                    {{-- IMAGEN --}}
                        <img src="{{$coche->foto}}" class="mt-7 m-auto" style="width: 23rem; height: 15rem;">

                    {{-- DATOS --}}
                    <div class="flex flex-col flex-wrap justify-center items-center h-auto pb-3 pt-5">
                        
                        {{-- PRECIO --}}
                        <div class="mb-2">
                            <p class="text-center text-2xl text-red-700 font-bold" style="text-shadow: 1px 1px 1px black">{{$coche->precio}}€</p> 
                        </div>
                        
                        <div class="flex flex-row flex-wrap justify-center items-center">

                            {{-- AÑO MATRICULACION --}}
                            <div class="text-lg text-center font-bold text-black ml-5 mr-2">
                                <p><i class="bi bi-calendar2-week-fill"></i> {{$coche->anio_matriculacion}}</p>
                            </div>

                            <b class="mr-2">|</b>

                            {{-- KILOMETRAJE --}}
                            <div class="text-lg text-center font-bold text-black mr-2 flex felx-wrap justify-center items-center flex-row">
                                <img style="width:1.5rem" class="mr-1" src="{{asset('img/iconoKilometros.png')}}" alt=""><b>{{$coche->kilometros}} kms</b>
                            </div>

                            <b class="mr-2">|</b>

                            <p style="opacity: 0; position: absolute;">{{$coche->potencia}}</p>

                            {{-- COMBUSTIBLE --}}
                            <div class="text-lg text-center font-bold text-black mr-2">
                                <p><i class="bi bi-fuel-pump-fill"></i> {{$coche->combustible}}</p>
                            </div>

                        </div>


                        @if (auth()->user()->nombre != "Admin")   <!------------------------------------------>

                        {{-- ACCESORIOS  Y CARRITO --}}
                        <div class="mt-5 flex flex-wrap justify-center items-center">
                            
                            <a href="{{route('coches.accesorios', $coche->idCoc)}}" class="bg-black mr-5  hover:bg-red-700 duration-700 hover:scale-105 text-white font-bold rounded px-3 py-1" style="visibility: visible">VER ACCESORIOS</a>
                            
                            <form action="{{route('carrito.agregar')}}" method="POST">
                            @csrf

                                <input type="hidden" value="<?= $coche->idCoc ?>" name="idCoche">
                                <input type="hidden" value="<?= auth()->user()->idUsu ?>" name="idUsu">

                                <button type="submit" class="bg-red-700 hover:bg-black duration-700 hover:scale-105 text-white font-bold rounded px-3 py-1" style="visibility: visible">AÑADIR <i class="bi bi-cart3"></i></button>
                            
                            </form>
                        </div>


                        @else                <!------------------------------------------>

                        <div class="flex flex-wrap justify-center items-center text-center mt-5">

                            {{-- EDITAR --}}
                            <div class="m-1" style="">
                                <a href="{{route('coches.editar', $coche->idCoc)}}" class="text-lg bg-black hover:bg-zinc-800 text-white font-bold rounded px-2 py-1 ">EDITAR</a>
                            </div>

                            {{-- BORRAR --}}
                            <div class="m-1" style="">
                                {{-- <a data-idCoc="{{$coche->idCoc}}" class="borrarCoche text-lg bg-red-700 hover:bg-black hover:text-red-700 text-white font-bold rounded px-2 py-1 ">BORRAR</a> --}}
                                <a href="{{route('coches.borrar', $coche->idCoc)}}" class="text-lg bg-red-700 hover:bg-black hover:text-red-700 text-white font-bold rounded px-2 py-1 ">BORRAR</a>
                            </div>

                        </div>

                        @endif

                    </div>

            </div>

            </a>

        @endforeach

    @endempty
@endsection

