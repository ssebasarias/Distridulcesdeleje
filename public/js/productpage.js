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
  
