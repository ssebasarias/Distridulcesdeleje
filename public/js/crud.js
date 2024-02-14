// Función para cargar un producto
function cargar(item, nombre, descripcion, precio) {
  seleccionarProducto();
  var seleccion = document.getElementById("seleccion");
  var imgSeleccionada = document.getElementById("img");
  var nombreSeleccionado = document.getElementById("nombre");
  var descripSeleccionada = document.getElementById("descripcion");
  var precioSeleccionado = document.getElementById("precio");

  seleccion.style.width = "40%";
  seleccion.style.height = "400px";
  seleccion.style.opacity = "1";
  item.style.backgroundColor = "#e6e6e6";

  // Calcula la posición del elemento seleccionado
  let rect = item.getBoundingClientRect();
  let top = rect.top + window.scrollY;

  // Establece la posición de "seleccion" al lado del elemento seleccionado
  seleccion.style.top = top + "px";

  // Obtener datos del producto
  const img = item.getElementsByTagName("img")[0];

  // Asignar valores a los elementos comunes
  imgSeleccionada.src = img.src;
  nombreSeleccionado.textContent = nombre;
  descripSeleccionada.textContent = descripcion;
  precioSeleccionado.textContent = "$ " + precio;
}

// Función para cerrar la ventana emergente
function cerrar() {
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

// Apardado funcionalidades crud

function mostrarFormulario(formulario) {
  if (formulario === 'agregar_categoria') {
    document.getElementById('formularioAgregarCategoria').style.display = 'block';
  } else {
    window.location.href = `/${formulario}`;
  }

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
      xhr.onload = function () {
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

// Manejar el envío del formulario de agregar categoría mediante AJAX
document.getElementById('formAgregarCategoria').addEventListener('submit', function (event) {
  event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

  var nombreCategoria = document.getElementById('nombreCategoria').value;

  // Crear una instancia de XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // Configurar la solicitud POST para agregar la nueva categoría
  xhr.open('POST', '/agregar_categoria', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  // Configurar el manejo de la respuesta
  xhr.onload = function () {
    if (xhr.status === 200) {
      alert('Nueva categoría agregada');
      // Puedes realizar acciones adicionales aquí, como recargar la página
      window.location.reload();
    } else {
      alert('Error al agregar la categoría');
    }
  };

  // Enviar los datos del formulario como JSON
  xhr.send(JSON.stringify({ nombre: nombreCategoria }));
});

function cerrarVentana() {
  document.getElementById('formularioAgregarCategoria').style.display = 'none';
}