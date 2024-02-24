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

}

// Función para cerrar el modal
function cerrarModal(event) {
  var modal = document.getElementById("myModal");
  if (event.target == modal || event.target.closest('.product-detail-close')) {
    modal.style.display = "none";
  }
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
  var modal = document.getElementById("formularioAgregar");
  var modal = document.getElementById("formularioAgregarCategoria");
  modal.style.display = "none";
}

function cerrarVentanaEditar(){
  var modal = document.getElementById("formularioEditar");
  modal.style.display = "none";
}

function actualizarProducto() {
  // Obtener los nuevos valores del formulario de edición
  var id = document.getElementById('idProductoEditar').value;
  var nuevoNombre = document.getElementById('nombreEditar').value;
  var nuevoPrecio = document.getElementById('precioEditar').value;a
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