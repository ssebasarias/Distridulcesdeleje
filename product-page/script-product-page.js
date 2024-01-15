// Función para mostrar el modal
function mostrarModal() {
    document.getElementById('modalLogin').style.display = 'block';
}

// Función para cerrar el modal
function cerrarModal() {
    document.getElementById('modalLogin').style.display = 'none';
}

// Asociar la función mostrarModal al clic del botón
document.getElementById('btnMostrarLogin').addEventListener('click', mostrarModal);
