let contenido = document.getElementById("contenido");
let seleccion = document.getElementById("seleccion");
let imgSeleccionada = document.getElementById("img");
let modeloSeleccionado = document.getElementById("modelo");
let descripSeleccionada = document.getElementById("descripcion");
let precioSeleccionado = document.getElementById("precio");

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
    descripSeleccionada.innerHTML = item.getElementsByClassName("detalles")[0].innerHTML;
    precioSeleccionado.innerHTML = item.getElementsByTagName("span")[0].innerHTML;
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

document.addEventListener('DOMContentLoaded', function () {
    // Obtén referencias a los elementos relevantes
    const enlaceInicio = document.getElementById('login');
    const modal = document.getElementById('modal');
    const cerrarModal = document.getElementById('cerrar-modal');

    // Función para mostrar el modal
    function mostrarModal() {
        modal.style.display = 'block';
    }

    // Función para ocultar el modal
    function ocultarModal() {
        modal.style.display = 'none';
    }

    // Asigna eventos a los elementos
    enlaceInicio.addEventListener('click', mostrarModal);
    cerrarModal.addEventListener('click', ocultarModal);

    // Cierra el modal si se hace clic fuera de él
    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            ocultarModal();
        }
    });
});
