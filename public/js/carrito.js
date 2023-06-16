//VENTANA ACCESORIOS

let botonExtra = document.getElementById("extras");
let todos = document.getElementsByClassName("extras");
let ventanaAccesorios = document.getElementsByClassName("ventanaAccesorios");
let visibles = false;

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
    var aniadirAcc = document.getElementsByClassName("aniadir");

    Array.prototype.forEach.call(aniadirAcc, function(element) {
        element.addEventListener("click", aniadirAccesorio);
        element.addEventListener("click", function() {
            element.style.backgroundColor = "green";
            element.innerText = "AÑADIDO";
            element.disabled = true;
        });
    });

    var precioTotal = document.getElementById("total");
    var resumen = document.getElementById("resumen");

    function aniadirAccesorio(e) {
        var totalActual = e.target.getAttribute("data-precio");
        var nombre = e.target.getAttribute("data-nombre");
        var valor = parseInt(precioTotal.innerText);

        valor += parseInt(totalActual);
        precioTotal.innerText = valor;

        var nuevoElemento = document.createElement("div");
        nuevoElemento.className = "flex flex-row justify-start items-start";
        nuevoElemento.innerHTML = "<p style='width:15rem'>" + nombre + "</p><b>" + totalActual + "€</b>";
        
        resumen.appendChild(nuevoElemento);
    }
