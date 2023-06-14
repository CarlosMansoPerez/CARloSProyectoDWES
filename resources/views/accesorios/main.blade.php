@extends("layouts.app")

@section("main")

    <style>
        @media (max-width: 850px) {

            #divAccesorios{
                width: 100% !important;
                justify-content: center !important;
            }
            #divAccesorios div{
                width: 80% !important;
                margin-left: 0 !important;
                display: flex;
                flex-direction: column;
                justify-content: center !important;
            }
            #divAccesorios div>div{
                margin-left: 10% !important;
            }
        }
    </style>

    @empty($datos)

        <div class="bg-red-300">
            No hay datos en la base de datos.
        </div> 

    @else

    @if (auth()->user()->nombre != "Admin")

    @else
        <a href="{{route('accesorios.insertar')}}" class="bg-white hover:bg-black text-black ml-6 mt-1 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded" style="width:20rem;position:absolute;left:38%;">INSERTAR NUEVO ACCESORIO</a>
    @endif

    <p id="listaAccesorios" class="text-white font-bold font-sans text-2xl" style="margin-left: 6%;margin-top:2%">Hola <b class="text-red-700">{{auth()->user()->nombre;}}</b></p>
        
    <div id="divAccesorios" class="flex justify-start flex-wrap items-center flex-row">
    @foreach($datos as $accesorio)

    {{-- CARDS --}}
    <div class="rounded shadow-lg mt-12 my-8 bg-gray-200 hover:bg-zinc-300 hover:cursor-pointer hover:scale-105 duration-300 shadow-black" style="width: 25rem;height:auto;min-height:29rem; margin-left: 5.5%;z-index:0;" >

        {{-- CABECERA --}}
            <div class="font-bold text-2xl mb-1 text-center">
                    <p class="text-2xl  mx-6 font-serif mt-5 ">{{$accesorio->nombre}}</p>
            </div>

            {{-- IMAGEN --}}
                <a href="{{route('coches.imagen', $accesorio->idCoc)}}"><img src="{{$accesorio->foto}}" class="mt-7 m-auto" style="width: 23rem; height: 15rem;"></a>

            {{-- DATOS --}}
            <div class="flex flex-col flex-wrap justify-center items-center h-auto pb-3 pt-5">
                
                {{-- PRECIO --}}
                <div class="mb-2">
                    <p class="text-center text-3xl text-red-700 font-bold mt-3" style="text-shadow: 1px 1px 1px black">{{$accesorio->precio}}€</p> 
                </div>

                @if (auth()->user()->nombre == "Admin")   <!------------------------------------------>

                <div class="flex flex-wrap justify-center items-center text-center mt-5">

                    {{-- EDITAR --}}
                    <div class="m-1" style="">
                        <a href="{{route('accesorios.editar', $accesorio->id)}}" class="text-lg bg-black hover:bg-zinc-800 text-white font-bold rounded px-2 py-1 ">EDITAR</a>
                    </div>

                    <div class="m-1" style="">
                        {{-- BORRAR --}}
                        <a href="{{route('accesorios.borrar', $accesorio->id)}}" class="text-lg bg-red-700 hover:bg-black hover:text-red-700 text-white font-bold rounded px-2 py-1 ">BORRAR</a>
                    </div>

                </div>

                @endif

            </div>

    </div>

@endforeach
</div>
    @endempty

@endsection