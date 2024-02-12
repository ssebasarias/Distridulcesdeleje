let mostrador = document.getElementById("mostrador");
let seleccion = document.getElementById("seleccion");
let imgSeleccionada = document.getElementById("img");
let modeloSeleccionado = document.getElementById("modelo");
let descripSeleccionada = document.getElementById("descripcion");
let precioSeleccionado = document.getElementById("precio");

// Función para cargar un producto
function cargar(item) {
    seleccionarProducto();
    mostrador.style.width = "60%";
    seleccion.style.width = "40%";
    seleccion.style.opacity = "1";
    item.style.backgroundColor = "#e6e6e6";

    // Calcula la posición del elemento seleccionado
    let rect = item.getBoundingClientRect();
    let top = rect.top + window.scrollY;

    // Establece la posición de "seleccion" al lado del elemento seleccionado
    seleccion.style.top = top + "px";

    imgSeleccionada.src = item.getElementsByTagName("img")[0].src;

    modeloSeleccionado.innerHTML =  item.getElementsByTagName("p")[0].innerHTML;

    descripSeleccionada.innerHTML = "Descripción del modelo ";

    precioSeleccionado.innerHTML =  item.getElementsByTagName("span")[0].innerHTML;
}

// Función para cerrar la ventana emergente
function cerrar() {
    contenido.style.width = "100%";
    seleccion.style.width = "0%";
    seleccion.style.opacity = "0";
    seleccionarProducto();
}

// Función para deseleccionar todos los productos
function seleccionarProducto() {
    var items = document.getElementsByClassName("item");
    for (i = 0; i < items.length; i++) {
        items[i].style.backgroundColor = "";
    }
}