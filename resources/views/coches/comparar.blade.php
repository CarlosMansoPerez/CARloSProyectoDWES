@extends("layouts.app")

@section("main")

    @empty($datos)

        <div class="bg-red-300">
            No hay datos en la base de datos.
        </div> 

    @else

    <div class="flex flex-col justify-center items-center flex-wrap pb-12">
        <div>
            <p class="text-3xl mt-5 font-bold text-white">Comparador de coches</p>
        </div>

        <div class="flex flex-row justify-around items-center flex-wrap mt-12" style="width:100%">

            <div class="flex flex-col justify-start items-center flex-wrap bg-gray-200 pb-5" style="width:30rem;height:auto;border-radius:2%">
                <select name="coche1" id="coche1" class="mt-10 mb-6 bg-black text-white">
                    <option value="" selected disabled>Selecciona coche</option>
                    @foreach ($datos as $item)
                        <option value="{{$item->foto}}" data-marca="{{$item->marca}}" data-modelo="{{$item->modelo}}" data-precio="{{$item->precio}}" data-anio="{{$item->anio_matriculacion}}" data-combustible="{{$item->combustible}}" data-kilometros="{{$item->kilometros}}">{{$item->marca}} {{$item->modelo}}</option>
                    @endforeach
                </select>
                <img id="imagen-coche" style="width:30rem;" class="mb-5">

                <div class="flex flex-col justify-center items-center flex-wrap">
                    <p id="marca" class="text-2xl py-2" ></p>
                    <p id="modelo" class="text-2xl py-2" ></p>
                    <p id="precio" class="text-2xl py-2" ></p>
                    <p id="anio" class="text-2xl py-2" ></p>
                    <p id="combustible" class="text-2xl py-2" ></p>
                    <p id="kilometros" class="text-2xl py-2" ></p>
                </div>

            </div>

            <div class="text-white text-5xl">VS</div>

            <div class="flex flex-col justify-start items-center flex-wrap bg-gray-200 pb-5" style="width:30rem;height:auto;border-radius:2%">
                <select name="coche2" id="coche2" class="mt-10 mb-6 bg-black text-white">
                    <option value="" selected disabled>Selecciona coche</option>
                    @foreach ($datos as $item)
                        <option value="{{$item->foto}}" data-marca="{{$item->marca}}" data-modelo="{{$item->modelo}}" data-precio="{{$item->precio}}" data-anio="{{$item->anio_matriculacion}}" data-combustible="{{$item->combustible}}" data-kilometros="{{$item->kilometros}}">{{$item->marca}} {{$item->modelo}}</option>                    @endforeach
                </select>
                <img id="imagen-coche2" style="width:30rem;" src="">

                <div class="flex flex-col justify-center items-center flex-wrap">
                    <p id="marca2" class="text-2xl py-2" ></p>
                    <p id="modelo2" class="text-2xl py-2" ></p>
                    <p id="precio2" class="text-2xl py-2" ></p>
                    <p id="anio2" class="text-2xl py-2" ></p>
                    <p id="combustible2" class="text-2xl py-2" ></p>
                    <p id="kilometros2" class="text-2xl py-2" ></p>
                </div>
            </div>

        </div>



    </div>

<script>
// COMPARADOR

    //Coche 1
    var selectCoche = document.getElementById("coche1");
    var imagenCoche = document.getElementById("imagen-coche");
    var marca = document.getElementById("marca");
    var modelo = document.getElementById("modelo");
    var precio = document.getElementById("precio");
    var anio = document.getElementById("anio");
    var combustible = document.getElementById("combustible");
    var kilometros = document.getElementById("kilometros");

    selectCoche.addEventListener("change", function() {
        var selectedOption = this.options[this.selectedIndex];
        var foto = selectedOption.value;
        var selectedMarca = selectedOption.getAttribute("data-marca");
        var selectedModelo = selectedOption.getAttribute("data-modelo");
        var selectedPrecio = selectedOption.getAttribute("data-precio");
        var selectedAnio = selectedOption.getAttribute("data-anio");
        var selectedCombustible = selectedOption.getAttribute("data-combustible");
        var selectedKilometros = selectedOption.getAttribute("data-kilometros");

        imagenCoche.src = foto;
        imagenCoche.style.height = "20rem";
        marca.textContent = selectedMarca;
        modelo.textContent = selectedModelo;
        precio.textContent = selectedPrecio + "€";
        anio.textContent = selectedAnio;
        combustible.textContent = selectedCombustible;
        kilometros.textContent = selectedKilometros + " kms";
    });

    //Coche 2
    var selectCoche2 = document.getElementById("coche2");
    var imagenCoche2 = document.getElementById("imagen-coche2");
    var marca2 = document.getElementById("marca2");
    var modelo2 = document.getElementById("modelo2");
    var precio2 = document.getElementById("precio2");
    var anio2 = document.getElementById("anio2");
    var combustible2 = document.getElementById("combustible2");
    var kilometros2 = document.getElementById("kilometros2");

    selectCoche2.addEventListener("change", function() {
        var selectedOption = this.options[this.selectedIndex];
        var foto = selectedOption.value;
        var selectedMarca = selectedOption.getAttribute("data-marca");
        var selectedModelo = selectedOption.getAttribute("data-modelo");
        var selectedPrecio = selectedOption.getAttribute("data-precio");
        var selectedAnio = selectedOption.getAttribute("data-anio");
        var selectedCombustible = selectedOption.getAttribute("data-combustible");
        var selectedKilometros = selectedOption.getAttribute("data-kilometros");

        imagenCoche2.src = foto;
        imagenCoche2.style.height = "20rem";
        marca2.textContent = selectedMarca;
        modelo2.textContent = selectedModelo;
        precio2.textContent = selectedPrecio + "€";
        anio2.textContent = selectedAnio;
        combustible2.textContent = selectedCombustible;
        kilometros2.textContent = selectedKilometros + " kms";
    });
</script>
    @endempty
@endsection

