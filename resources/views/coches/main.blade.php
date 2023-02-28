@extends("layouts.app")

@section("main")


        <div class="bg-white-900">
        
                    {{-- @foreach($datos as $coche) --}}
                    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">MERCEDES-BENZ</h5>

                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                    </div>
                    {{-- @endforeach --}}

        {{-- <h1 class="m-9 text-2xl text-center">@lang("app.etq_tienes"){{ trans_choice("app.etq_total", $datos->count(), ["num" => $datos->count()]) }}</h1> --}}

        </div> 


@endsection