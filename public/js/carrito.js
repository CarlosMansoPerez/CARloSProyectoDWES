//VENTANA ACCESORIOS

let botonExtra = document.getElementById("extras");
let todos = document.getElementsByClassName("extras");
let ventanaAccesorios = document.getElementsByClassName("ventanaAccesorios");
let visibles = false; // Variable de control para alternar la visibilidad

Array.from(todos).forEach(element => {
    element.addEventListener("click", aparece);
});

function aparece() {
    if (visibles) {
        botonExtra.innerText="VER EXTRAS"
        Array.from(ventanaAccesorios).forEach(ventana => {
            ventana.style.display = "none";
        });
        visibles = false;
    } else {
        botonExtra.innerText="OCULTAR EXTRAS"
        Array.from(ventanaAccesorios).forEach(ventana => {
            ventana.style.display = "block";
        });
        visibles = true;
    }
}


//AÑADIR PRECIO DE ACCESORIO AL TOTAL DEL CARRITO
let aniadirAcc = document.getElementsByClassName("aniadir");
Array.from(aniadirAcc).forEach(element => {
    element.addEventListener("click", aniadirAccesorio);
    element.addEventListener("click", function(){
        element.style.backgroundColor="green"
        element.innerText="AÑADIDO"
        element.disabled = true;
    });
});

let precioTotal = document.getElementById("total");
let resumen = document.getElementById("resumen");
function aniadirAccesorio(e){

    let totalActual = e.explicitOriginalTarget.dataset.precio;
    let nombre = e.explicitOriginalTarget.dataset.nombre;
    let valor = parseInt(precioTotal.innerText);

    valor += parseInt(totalActual)
    
    precioTotal.innerText=valor

    resumen.innerHTML += "<div class='flex flex-row justify-start items-start'><p style='width:15rem'>"+nombre+"</p><b>"+totalActual+"€</b></div>";

}


