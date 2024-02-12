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

    obtenerProducto(id);
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

function mostrarFormulario(formulario) {
      window.location.href = `/${formulario}`;
    }

    function editarProducto(id) {
      if (id) {
        window.location.href = `/editar/${id}`;
      } else {
        alert('ID de producto inválido');
      }
    }

    function eliminarProducto(id) {
      if (id) {
        if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
          // Crear una instancia de XMLHttpRequest
          var xhr = new XMLHttpRequest();
          
          // Configurar la solicitud DELETE
          xhr.open('DELETE', '/eliminar/' + id, true);
    
          // Configurar el manejo de la respuesta
          xhr.onload = function() {
            if (xhr.status === 200) {
              alert('Producto eliminado');
              // Puedes redirigir a la página principal u otro lugar después de eliminar el producto
              window.location.href = 'crud';
            } else {
              alert('Error al eliminar el producto');
            }
          };
    
          // Enviar la solicitud DELETE al servidor
          xhr.send();
        } else {
          alert('Operación cancelada');
        }
      } else {
        alert('ID de producto inválido');
      }
    }