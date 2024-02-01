let contenido = document.getElementById("contenido");
let seleccion = document.getElementById("seleccion");
let imgSeleccionada = document.getElementById("img");
let modeloSeleccionado = document.getElementById("modelo");
let descripSeleccionada = document.getElementById("descripcion");
let precioSeleccionado = document.getElementById("precio");

let imgSeleccionadaMobile = document.getElementById("img-mobile");
let modeloSeleccionadoMobile = document.getElementById("modelo-mobile");
let descripSeleccionadaMobile = document.getElementById("descripcion-mobile");
let precioSeleccionadoMobile = document.getElementById("precio-mobile");

function cargar(item) {
    quitarBordes();
    seleccion.style.width = "40%";
    seleccion.style.height = "40%";
    seleccion.style.opacity = "1";
    item.style.backgroundColor = "#e6e6e6";

    // Calcula la posición del elemento seleccionado
    let rect = item.getBoundingClientRect();
    let top = rect.top + window.scrollY;

    // Establece la posición de "seleccion" al lado del elemento seleccionado
    seleccion.style.top = (top - 152) + "px";

    imgSeleccionada.src = item.getElementsByTagName("img")[0].src;
    modeloSeleccionado.innerHTML = item.getElementsByTagName("p")[0].innerHTML;
    precioSeleccionado.innerHTML = item.getElementsByTagName("span")[0].innerHTML;

    imgSeleccionadaMobile.src = item.getElementsByTagName("img")[0].src;
    modeloSeleccionadoMobile.innerHTML = item.getElementsByTagName("p")[0].innerHTML;
    precioSeleccionadoMobile.innerHTML = item.getElementsByTagName("span")[0].innerHTML;
}

function cerrar() {
    contenido.style.width = "100%";
    seleccion.style.width = "0%";
    seleccion.style.opacity = "0";
    quitarBordes();
}

function quitarBordes() {
    var items = document.getElementsByClassName("item");
    for (i = 0; i < items.length; i++) {
        items[i].style.backgroundColor = "";
    }
}

