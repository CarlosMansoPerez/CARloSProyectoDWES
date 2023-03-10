@extends("layouts.app")

@section("main")

    @empty($datos)

        <div class="bg-red-300">
            No hay datos en la base de datos.
        </div> 

    @else
        {{-- FILTRO --}}
        {{-- <div class="text-red-500 text-lg" style="width:100%;height:3rem;background-color:#333333">
            <div class="flex justify-start">            
                <p class="mt-2 ml-5 mt-4 font-semibold">Filtrar por</p>
                {{-- MARCA --}}
                {{-- <select name="marcas" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer" style="width:10rem;height:3rem;">
                    <option value=""selected disabled>Marca</option>
                    @foreach ($marcas as $item)
                        <option value="{{$item->marca}}">{{$item->marca}}</option>
                    @endforeach
                </select> --}}
                {{-- MODELO --}}
                {{-- <select name="modelos" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer" style="width:8rem;height:3rem;">
                    <option value=""selected disabled>Modelo</option>
                    @foreach ($modelos as $item)
                        <option value="{{$item->modelo}}">{{$item->modelo}}</option>
                    @endforeach 
                </select> --}}
                {{-- PRECIO --}}
                {{-- <select name="precios" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer" style="width:11rem;height:3rem;">
                    <option value=""selected disabled>Precio</option>
                    <option value="">0 - 5000€</option>
                    <option value="">5000  - 10000€</option>
                    <option value="">10000 - 20000€</option>
                    <option value="">20000 - 50000€</option>
                    <option value="">50000 - 100000€</option> --}}
                        {{-- @foreach ($precios as $item)
                            <option value="{{$item->precio}}">{{$item->precio}}</option>
                        @endforeach --}}
                {{-- </select> --}}
                {{-- AÑO MATRICULACION --}}
                    {{-- <select name="anios" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer" style="width:8rem;height:3rem;">
                        <option value="" selected disabled>Año</option>
                            @foreach ($anios as $item)
                                <option value="{{$item->anio_matriculacion}}">{{$item->anio_matriculacion}}</option>
                            @endforeach
                    </select> --}}
                {{-- COLOR --}}
                {{-- <select name="colores" class="ml-5 mt-2 bg-black text-white hover:cursor-pointer" style="width:8rem;height:3rem;">
                    <option value="">Color</option>
                    @foreach ($color as $item)
                        <option value="{{$item->color}}" style="background:#{{$item->color}}"><span style="">Color</span></option>
                    @endforeach
                </select>
            </div>
        </div> --}}

        {{-- {{dd(auth()->user());}} --}}

        @if (auth()->user()->nombre != "Admin")
        
        @else

        <a href="{{route('coches.insertar')}}" class="bg-white hover:bg-black text-black ml-6 mt-4 hover:text-white hover:scale-105 duration-500 font-bold py-2 px-4 text-center rounded" style="width:20rem;position:absolute;left:38%;">INSERTAR NUEVO COCHE</a>
        
        @endif

        <p class="text-white font-bold font-sans text-2xl" style="position:absolute;left:5%;top:109%;">Hola <b class="text-red-700">{{auth()->user()->nombre;}}</b></p>
<br>

    @foreach($datos as $coche)

            {{-- CARDS --}}
            <div class="rounded float-left shadow-lg mt-12 my-8 bg-gray-200 hover:bg-zinc-300 hover:cursor-pointer hover:scale-105 duration-300 shadow-black" style="width: 25rem;height:32rem; margin-left: 5.5%;z-index:0;" >

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
                        <a href="{{route('coches.imagen', $coche->idCoc)}}"><img src="{{$coche->foto}}" class="mt-7 m-auto" style="width: 23rem; height: 15rem;"></a>

                    {{-- DATOS --}}
                    <div class="px-6 mb-6">

                        {{-- PRECIO --}}
                        <p class="text-center text-2xl text-red-700 mt-2 mb-1 font-bold" style="text-shadow: 1px 1px 1px black">{{$coche->precio}}€</p> 


                            {{-- AÑO MATRICULACION --}}
                            <div class="text-sm font-bold text-black m-3" style="height: 1rem; float: left;">
                                <p>Año de matriculación</p>
                                <p class="text-sm font-bold font-serif text-black text-xl text-center">{{$coche->anio_matriculacion}}</p>
                                
                            @if (auth()->user()->nombre != "Admin")   <!------------------------------------------>
                                {{-- ACCESORIOS --}}
                                <div class="mt-4" style="position:relative;top:90%;left:40%;">
                                
                                    <a href="{{route('coches.accesorios', $coche->idCoc)}}#accesoriosCoches" class="bg-black hover:bg-red-700 duration-700 hover:scale-105 text-white font-bold py-2 px-4 rounded ml-6" style="visibility: visible">VER ACCESORIOS</a>

                                </div>

                            </div>                            

                            {{-- COLOR --}}
                            <div class="text-sm font-bold text-black m-3" style="float: right;">
                                <p class="text-center">Color</p>
                                <div class="text-sm font-bold text-black text-lg m-auto" style="background-color: {{$coche->color}}; width:1.2rem; height: 1.2rem; border: 3px solid black">&nbsp;</div>
                            </div>

                            @else                <!------------------------------------------>

                                {{-- EDITAR --}}
                                <div class="mt-6" style="float: left;">
                                    
                                    <a href="{{route('coches.editar', $coche->idCoc)}}" class="bg-black hover:bg-zinc-800 text-white font-bold py-2 px-4 rounded">EDITAR</a>
                                    
                                </div>

                                {{-- VER ACCESORIOS --}}
                                {{-- <div class="mt-6 ml-6" style="float: left;">
                                </div> --}}

                            </div>                            

                            {{-- COLOR --}}
                            <div class="text-sm font-bold text-black m-3" style="float: right;">
                                <p class="text-center">Color</p>
                                <div class="text-sm font-bold text-black text-lg m-auto" style="background-color: {{$coche->color}}; width:1.2rem; height: 1.2rem; border: 3px solid black">&nbsp;</div>
                                {{-- BORRAR --}}
                                <div class="mt-8" style="float: right;">
                                    <a href="{{route('coches.borrar', $coche->idCoc)}}" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">BORRAR</a>
                                </div>
                            </div>

                            @endif

                    </div>

            </div>

        @endforeach

    @endempty
@endsection

