@extends("layouts.app")

@section("main")

    @empty($datos)

        <div class="bg-red-300">
            No hay datos en la base de datos.
        </div> 

    @else

        <div class="bg-white-900">
        
            <table class="my-8 text-justify m-auto bg-gray-300" style="width: 80%;">
                <thead class="bg-gray-800 text-stone-50 text-center">
                    <tr>
                        <th class="p-3" style="width:20rem;">@lang("app.etq_receta")</th>
                        <th style="width: 30rem;">@lang("app.etq_descripcion")</th>
                        <th class="font-bold" style="width: 10rem;">@lang("app.etq_fecha")</th>
                        <th style="width:1rem;"></th>
                        <th style="width:1rem;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $coche)
                            <td style="padding: 15px" class="text-center">{{ $coche->marca }}</td>
                            <td style="padding: 15px">{{ $coche->modelo }}</td>
                            <td style="padding: 15px" class="text-center">{{ $coche->precio }}</td>
                            <td style="padding: 15px">
                                <a href="">EDITAR </a>
                            </td>
                            <td style="padding: 10px">
                                <a href=" {{route("coche.borrar", ["id" => $coche->idCoc])}} ">BORRAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

        </table>

        </div> 

    @endempty

@endsection