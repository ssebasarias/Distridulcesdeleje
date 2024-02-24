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

// Cargar las categorías al cargar la página
window.onload = function() {
    cargarCategorias();
  };
  
  // Función para cargar las categorías desde la base de datos
  function cargarCategorias() {
    // Realiza una petición AJAX para obtener las categorías desde el servidor
    // Supongamos que hay una función obtenerCategorias() que realiza esta petición
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
      });
  }
  
