// Seleccionar elementos comunes
const contenido = document.getElementById("contenido");
const seleccion = document.getElementById("seleccion");

// Seleccionar elementos específicos
const imgSeleccionada = document.getElementById("img");
const modeloSeleccionado = document.getElementById("modelo");
const precioSeleccionado = document.getElementById("precio");

const imgSeleccionadaMobile = document.getElementById("img-mobile");
const modeloSeleccionadoMobile = document.getElementById("modelo-mobile");
const precioSeleccionadoMobile = document.getElementById("precio-mobile");

// Función para cargar un producto
function cargar(item) {
    seleccionarProducto();
    seleccion.style.width = "40%";
    seleccion.style.height = "40%";
    seleccion.style.opacity = "1";
    item.style.backgroundColor = "#e6e6e6";

    // Calcula la posición del elemento seleccionado
    let rect = item.getBoundingClientRect();
    let top = rect.top + window.scrollY;

    // Establece la posición de "seleccion" al lado del elemento seleccionado
    seleccion.style.top = top + "px";

    // Obtener datos del producto
    const img = item.getElementsByTagName("img")[0];
    const descripcion = item.getElementsByTagName("p")[0];
    const precio = item.getElementsByTagName("span")[0];

    // Asignar valores a los elementos comunes
    imgSeleccionada.src = img.src;
    modeloSeleccionado.innerHTML = descripcion.innerHTML;
    precioSeleccionado.innerHTML = precio.innerHTML;

    // Asignar valores a los elementos específicos para móvil
    imgSeleccionadaMobile.src = img.src;
    modeloSeleccionadoMobile.innerHTML = descripcion.innerHTML;
    precioSeleccionadoMobile.innerHTML = precio.innerHTML;
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


// ==================== Ventana eliminar produto
document.addEventListener('DOMContentLoaded', function () {
    // Obtén referencias a los elementos relevantes
    const enlaceInicio = document.getElementById('btn-delete');
    const modal = document.getElementById('modal-delete');
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

    // Obtener referencia a los botones de sí y no
    const btnSi = document.getElementById('btn-si');
    const btnNo = document.getElementById('btn-no');

    // Event listener para el botón de sí
    btnSi.addEventListener('click', function() {
        // Aquí puedes ejecutar la acción correspondiente cuando el usuario confirma con "Sí"
        console.log('El usuario ha confirmado con "Sí"');
        ocultarModal(); // Cerrar el modal después de la confirmación
    });

    // Event listener para el botón de no
    btnNo.addEventListener('click', function() {
        // Aquí puedes ejecutar la acción correspondiente cuando el usuario elige "No"
        console.log('El usuario ha elegido "No"');
        ocultarModal(); // Cerrar el modal después de la negación
    });
});


// ====================== Ventana emergente editar producto

document.addEventListener('DOMContentLoaded', function () {
    // Obtén referencias a los elementos relevantes
    const enlaceInicio = document.getElementById('btn-edit');
    const modal = document.getElementById('modal-edit');
    const cerrarModal = document.getElementById('cerrar-modal');

    // Función para mostrar el modal
    function mostrarModal() {
        modal.style.display = 'block';
    }

    // Función para ocultar el modal
    function ocultarModal() {
        modal.style.display = 'none';
    }

    // Event listener para mostrar el modal al hacer clic en el botón de editar
    enlaceInicio.addEventListener('click', mostrarModal);

    // Event listener para ocultar el modal al hacer clic en el botón de cerrar
    cerrarModal.addEventListener('click', ocultarModal);

    // Cierra el modal si se hace clic fuera de él
    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            ocultarModal();
        }
    });

    // Event listener para el formulario de edición
    const formulario = document.querySelector('#modal-edit form');
    formulario.addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe de manera tradicional

        // Aquí puedes agregar la lógica para procesar los datos del formulario, como validar y enviarlos a través de AJAX
        console.log('Datos del formulario enviados:', obtenerDatosFormulario());
        
        // Cierra el modal después de enviar el formulario
        ocultarModal();
    });

    // Función para obtener los datos del formulario
    function obtenerDatosFormulario() {
        const nombre = document.getElementById('nombre').value;
        const descripcion = document.getElementById('descripcion').value;
        const precio = document.getElementById('precio').value;
        const categoria = document.getElementById('categoria').value;
        const imagen = document.getElementById('imagen').files[0]; // Obtener el archivo de imagen seleccionado

        // Retorna un objeto con los datos del formulario
        return {
            nombre: nombre,
            descripcion: descripcion,
            precio: precio,
            categoria: categoria,
            imagen: imagen
        };
    }
});


