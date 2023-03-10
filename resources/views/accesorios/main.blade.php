@extends("layouts.app")

@section("main")

    @empty($datos)

        <div class="bg-red-300">
            No hay datos en la base de datos.
        </div> 

    @else

    @if (auth()->user()->nombre != "Admin")

    @else
        <a href="{{route('accesorios.insertar')}}" class="bg-white hover:bg-black text-black ml-6 mt-1 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded" style="width:20rem;position:absolute;left:38%;">INSERTAR NUEVO ACCESORIO</a>
    @endif

    <p class="text-white font-bold font-sans text-2xl" style="position:absolute;left:5%;top:108%;">Hola <b class="text-red-700">{{auth()->user()->nombre;}}</b></p>

    @foreach($datos as $accesorio)
<br id="accesorios">
            {{-- CARDS --}}
            <div class="rounded float-left mt-12 mb-7 shadow-lg my-8 bg-gray-200 hover:bg-gray-300 hover:scale-105 duration-700 text-center shadow-black" style="width: 15rem;height:19rem; margin-left: 5.5%;z-index:0;" >

                {{-- CABECERA --}}
                    <div class="font-bold text-2xl mb-1">
                            <p class="text-lg  mx-6 mt-5 font-serif">{{$accesorio->nombre}}</p>
                            <p class="text-2xl mx-6  font-serif text-red-700">{{$accesorio->precio}}€</p>
                    </div>

                    {{-- IMAGEN --}}
                        <img src="{{$accesorio->foto}}" class="mt-3  m-auto" style="width: 15rem; height: 10rem;">

                    @if (auth()->user()->nombre != "Admin")
                    
                    @else

                        <div class="mt-1">
                            {{-- BORRAR --}}
                            <div class="mt-3 ml-3" style="float: left;">
                                <a href="{{route('accesorios.editar', $accesorio->idAcc)}}" class="bg-black hover:bg-zinc-800 text-white font-bold py-2 px-4 rounded">EDITAR</a>
                            </div>
                            {{-- EDITAR --}}
                            <div class="mt-3 mr-3" style="float: right;">
                                <a href="{{route('accesorios.borrar', $accesorio->idAcc)}}" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">BORRAR</a>
                            </div>

                    @endif

                    </div>
                </div>

        @endforeach

    @endempty

@endsection