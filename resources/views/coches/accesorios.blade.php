@extends("layouts.app")

@section("main")

    @if(count($accesorios) == 0)

        <div class="bg-red-300 text-center py-6 text-xl">
            <p id="accesoriosCoches">No hay accesorios disponibles para el <b>{{$coche->marca}} {{$coche->modelo}}</b></p>
            <p>Contacta con el administrador de la base de datos para insertarlos</p><br>
            <a class="bg-black hover:bg-zinc-800 font-sans text-white ml-6 mt-6 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded" href="{{route('coches.listado')}}">VOLVER</a>
        </div> 

    @else

    <p id="accesoriosCoches" class="text-center mt-6 text-white text-2xl pb-4">Accesorios <br> <b>{{$coche->marca}} {{$coche->modelo}}</b></p>

    @foreach($accesorios as $accesorio)

            {{-- CARDS --}}
            <div class="rounded float-left shadow-lg my-8 bg-gray-200 hover:bg-gray-300 hover:scale-105 duration-700 text-center shadow-black" style="width: 15rem;height:19rem; margin-left: 7.5%;z-index:0;" >

                {{-- CABECERA --}}
                    <div class="font-bold text-2xl mb-1">
                            <p class="text-lg  mx-6 mt-5 font-serif">{{$accesorio->nombre}}</p>
                            <p class="text-2xl mx-6  font-serif text-red-700">{{$accesorio->precio}}€</p>
                    </div>

                    {{-- IMAGEN --}}
                        <img src="{{$accesorio->foto}}" class="mt-3  m-auto" style="width: 15rem; height: 10rem;">
                    
                    <?php if(auth()->user()->idUsu == 2){ ?>
                    <div class="mt-1">
                        {{-- BORRAR --}}
                        <div class="mt-3 ml-3" style="float: left;">
                            <a href="{{route('accesorios.editar', $accesorio->id)}}" class="bg-black hover:bg-zinc-800 text-white font-bold py-2 px-4 rounded">EDITAR</a>
                        </div>
                        {{-- EDITAR --}}
                        <div class="mt-3 mr-3" style="float: right;">
                            <a href="{{route('accesorios.borrar', $accesorio->id)}}" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">BORRAR</a>
                        </div>
                    <?php } ?>
                    </div>
                </div>

        @endforeach

    @endempty

@endsection