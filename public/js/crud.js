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
function cargar(item, id) {
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

    obtenerCategoria(id);
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


// ====================== Ventana editar producto

function manejarBotonEditar() {
    // Obtén referencias a los elementos relevantes
    const enlacesInicio = document.getElementsByClassName('btn-edit');
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

    // Asigna eventos a los elementos
    for (let i = 0; i < enlacesInicio.length; i++) {
        enlacesInicio[i].addEventListener('click', mostrarModal);
    }
    cerrarModal.addEventListener('click', ocultarModal);

    // Cierra el modal si se hace clic fuera de él
    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            ocultarModal();
        }
    });
}

function cargarInformacionProducto(idProducto) {
    // Realizar una solicitud AJAX para obtener la información del producto desde el servidor
    fetch(`/obtener-producto/${idProducto}`)
        .then(response => response.json())
        .then(data => {
            // Actualizar los valores de los campos del formulario con la información del producto
            document.getElementById("nombre-edit").value = data.nombre;
            document.getElementById("descripcion-edit").value = data.descripcion;
            document.getElementById("precio-edit").value = data.precio;

            // Obtener las categorías disponibles del servidor
            fetch('/categorias')
                .then(response => response.json())
                .then(categorias => {
                    // Obtener el menú desplegable de categorías
                    const selectCategoria = document.getElementById('categoria-edit');
                    // Limpiar las opciones existentes del menú desplegable
                    selectCategoria.innerHTML = '';
                    // Agregar las categorías como opciones al menú desplegable
                    categorias.forEach(categoria => {
                        const option = document.createElement('option');
                        option.value = categoria;
                        option.textContent = categoria;
                        // Si la categoría coincide con la del producto, marcarla como seleccionada
                        if (categoria === data.categoria) {
                            option.selected = true;
                        }
                        selectCategoria.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al obtener las categorías:', error));
        })
        .catch(error => console.error('Error al obtener la información del producto:', error));
}

document.getElementById("editar-formulario").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma convencional

    // Obtener los valores de los campos del formulario
    const nombre = document.getElementById("nombre-edit").value;
    const descripcion = document.getElementById("descripcion-edit").value;
    const precio = document.getElementById("precio-edit").value;
    const categoria = document.getElementById("categoria-edit").value;

    // Obtener el ID del producto desde la URL
    const urlParams = new URLSearchParams(window.location.search);
    const idProducto = urlParams.get('id'); // Suponiendo que el ID del producto está en la URL

    // Crear un objeto con los datos del producto
    const datosProducto = {
        nombre: nombre,
        descripcion: descripcion,
        precio: precio,
        categoria: categoria
    };

    // Realizar una solicitud AJAX para actualizar los datos del producto en el servidor
    fetch(`/actualizar-producto/${idProducto}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datosProducto)
    })
        .then(response => response.json())
        .then(data => {
            // Manejar la respuesta del servidor si es necesario
            console.log('Datos actualizados:', data);
            // Redirigir a la página de CRUD después de la actualización
            window.location.href = '/crud';
        })
        .catch(error => console.error('Error al actualizar los datos del producto:', error));
});



// ==================== Ventana eliminar produto
function manejarBotonEliminar() {
    // Obtén referencias a los elementos relevantes
    const enlacesInicio = document.getElementsByClassName('btn-delete');
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
    for (let i = 0; i < enlacesInicio.length; i++) {
        enlacesInicio[i].addEventListener('click', mostrarModal);
    }
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
    btnSi.addEventListener('click', function () {
        // Aquí puedes ejecutar la acción correspondiente cuando el usuario confirma con "Sí"
        console.log('El usuario ha confirmado con "Sí"');
        ocultarModal(); // Cerrar el modal después de la confirmación
    });

    // Event listener para el botón de no
    btnNo.addEventListener('click', function () {
        // Aquí puedes ejecutar la acción correspondiente cuando el usuario elige "No"
        console.log('El usuario ha elegido "No"');
        ocultarModal(); // Cerrar el modal después de la negación
    });
}


// ====================== Ventana agregar producto

document.addEventListener('DOMContentLoaded', function () {
    // Obtén referencias a los elementos relevantes
    const enlaceInicio = document.getElementById('btn-add');
    const modal = document.getElementById('modal-add');
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
});

function obtenerCategoria(id) {
    
}