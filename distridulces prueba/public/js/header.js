document.addEventListener('DOMContentLoaded', function () {
    // Obtén referencias a los elementos relevantes
    const enlaceInicio = document.getElementById('btn-login');
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
