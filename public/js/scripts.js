// SCRIPTS PARA CARloS

document.getElementById("filtrado").addEventListener("change", tipoFiltrado);
var filtroSeleccionado = document.getElementById("filtrado");

var tipodeFiltrado = document.querySelectorAll(".tipoFiltrado");

function tipoFiltrado() {
    tipodeFiltrado.forEach(element => {
    if (element.id == filtroSeleccionado.value) {
        element.style.display = "flex";
    } else {
        element.style.display = "none";
    }
    });
}


// FILTROS DE BÚSQUEDA

document.getElementById("marcas").addEventListener("change", filtroMarca);
document.getElementById("modelos").addEventListener("change", filtroModelo);
document.getElementById("precios").addEventListener("change", filtroPrecio);
document.getElementById("anios").addEventListener("change", filtroAnio);
document.getElementById("combustibles").addEventListener("change", filtroCombustible);
document.getElementById("kilometros").addEventListener("change", filtroKilometros);

var registros = 0;

function filtroMarca(e) {

    var valor = e.srcElement.value;
    let cards = document.querySelectorAll(".filtro");
    
    cards.forEach((element) => {
        element.style.display = "block";
    });

    cards.forEach((element) => {
        var marcas = element.innerText.split("\n")[0];
        if (marcas != valor) {
            element.style.display = "none";
        }
    });
}

function filtroModelo(e){
    var valor  = e.srcElement.value;
    let cards = document.querySelectorAll(".filtro");

    cards.forEach((element) => {
        element.style.display = "block";
    });
    cards.forEach(element => {
        var modelos = element.innerText.split("\n")[2];
        if(modelos != valor) element.style.display="none";
    });
}

function filtroPrecio(e){
    var valor  = parseInt(e.srcElement.value);
    let cards = document.querySelectorAll(".filtro");

    cards.forEach((element) => {
        element.style.display = "block";
    });
    
    cards.forEach(element => {
        var precios = parseInt(element.innerText.split("\n")[4]);
        if(precios > valor) element.style.display="none";
    });
}

function filtroAnio(e){
    var valor  = parseInt(e.srcElement.value);
    let cards = document.querySelectorAll(".filtro");
    cards.forEach((element) => {
        element.style.display = "block";
    });
    cards.forEach(element => {
        var anios = parseInt(element.innerText.split("\n")[6]);
        if(anios != valor) element.style.display="none";
    });
}

function filtroCombustible(e){
    var valor  = e.srcElement.value.trim();
    let cards = document.querySelectorAll(".filtro");
    cards.forEach((element) => {
        element.style.display = "block";
    });
    cards.forEach(element => {
        var combustibles = element.innerText.split("\n")[12].trim();
        if(combustibles != valor) element.style.display="none";
    });
}

function filtroKilometros(e){
    var valor  = parseInt(e.srcElement.value);
    let cards = document.querySelectorAll(".filtro");
    cards.forEach((element) => {
        element.style.display = "block";
    });
    cards.forEach(element => {
        var kilometros = parseInt(element.innerText.split("\n")[9]);
        if(kilometros > valor) element.style.display="none";
    });
}

//BORRAR FILTROS

document.getElementById("borrarFiltros").addEventListener("click", borrarFiltros);

function borrarFiltros(){
    location.reload(true);
}

//TOOLTIP

document.getElementById("compara").addEventListener("mouseover", aparece);
document.getElementById("compara").addEventListener("mouseout", desaparece);
var tooltip = document.getElementById("tooltip");

function aparece(){
    tooltip.style.display = "block";
    tooltip.style.transition = "0.4s";
}

function desaparece(){
    tooltip.style.display = "none";
    tooltip.style.transition = "0.4s";
} 