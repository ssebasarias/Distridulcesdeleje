// Obtener el modal
var modal = document.getElementById("myModal");

// Cuando el usuario haga clic fuera del modal, este se cerrará
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Función para abrir el modal y mostrar los detalles del producto
function cargarModal(nombre, descripcion, precio, imagen) {
  var modal = document.getElementById("myModal");
  var imgSeleccionada = document.getElementById("img");
  var nombreSeleccionado = document.getElementById("nombre");
  var descripSeleccionada = document.getElementById("descripcion");
  var precioSeleccionado = document.getElementById("precio");

  imgSeleccionada.src = imagen;
  nombreSeleccionado.textContent = nombre;
  descripSeleccionada.textContent = descripcion;
  precioSeleccionado.textContent = "$ " + precio;

  modal.style.display = "block";
}

// Función para cerrar el modal
function cerrarModal(event) {
  var modal = document.getElementById("myModal");
  if (event.target == modal || event.target.closest('.product-detail-close')) {
    modal.style.display = "none";
  }
}

// Cargar las categorías al cargar la página
window.onload = function () {
  cargarCategorias();
};

// Función para obtener las categorías desde el servidor
function obtenerCategorias() {
  return new Promise((resolve, reject) => {
    fetch('/funciones.php?accion=obtener_categorias')
      .then(response => {
        if (!response.ok) {
          throw new Error('Error al obtener las categorías');
        }
        return response.json();
      })
      .then(data => resolve(data))
      .catch(error => reject(error.message));
  });
}

// Función para cargar las categorías desde la base de datos
function cargarCategorias() {
  // Realiza una petición AJAX para obtener las categorías desde el servidor
  obtenerCategorias()
    .then(categorias => {
      // Una vez se obtienen las categorías, las mostramos en el menú
      const categoryList = document.getElementById("categoryList");
      categorias.forEach(categoria => {
        const listItem = document.createElement("li");
        listItem.innerHTML = `<a href="#" onclick="cargarProductos('${categoria.id}')">${categoria.nombre}</a>`;
        categoryList.appendChild(listItem);
      });
    })
    .catch(error => {
      console.error("Error al cargar las categorías:", error);
      // Aquí podrías mostrar un mensaje de error al usuario
    });
}


function abrirVentanaEditar(id,nombre,descripcion,precio,descuento) {
  var modal = document.getElementById("formularioEditar");
  document.getElementById('idProductoEditar').value = id;
  document.getElementById('nombreEditar').value = nombre;
  document.getElementById('precioEditar').value = precio;
  document.getElementById('descripcionEditar').value = descripcion;
  document.getElementById('descuentoEditar').value = descuento;
  modal.style.display = "block";
}

function abrirVentanaAgregar(){
  var modal = document.getElementById("formularioAgregar");
  var modal = document.getElementById("formularioAgregarCategoria");
  modal.style.display = "block";
}
function cerrarVentana() {
  var modal = document.getElementById("formularioEditar");
  var modal = document.getElementById("formularioAgregar");
  var modal = document.getElementById("formularioAgregarCategoria");
  modal.style.display = "none";
}

function actualizarProducto() {
  // Obtener los nuevos valores del formulario de edición
  var id = document.getElementById('idProductoEditar').value;
  var nuevoNombre = document.getElementById('nombreEditar').value;
  var nuevoPrecio = document.getElementById('precioEditar').value;
  var nuevaDescripcion = document.getElementById('descripcionEditar').value;
  var nuevaImagen = document.getElementById('imagenEditar').files[0];

  // Crear un objeto FormData para enviar los datos
  var formData = new FormData();
  formData.append('id', id);
  formData.append('nombre', nuevoNombre);
  formData.append('precio', nuevoPrecio);
  formData.append('descripcion', nuevaDescripcion);
  formData.append('imagen', nuevaImagen);

  // Realizar la solicitud POST al servidor para actualizar el producto
fetch('./controladores/actualizar_producto.php', {
  method: 'POST',
  body: formData
})
.then(response => {
  if (response.ok) {
      // Si la actualización fue exitosa, recargar la página para mostrar los cambios
      window.location.reload();
  } else {
      // Si hubo un error en la actualización, mostrar un mensaje de error
      console.error('Error al actualizar el producto');
  }
})
.catch(error => {
  console.error('Error al conectar con el servidor:', error);
});
}