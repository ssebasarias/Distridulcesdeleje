document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector('.slider-mobile');
    const fila = document.querySelector('.fila');
    const items = document.querySelectorAll('.item');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let currentPosition = 0;
    const itemWidth = items[0].offsetWidth;
    const numItems = items.length;
    const totalWidth = itemWidth * numItems;

    // Definir función para mover el slider
    function moveSlider() {
        if (currentPosition <= -totalWidth) {
            currentPosition = 0;
        } else {
            currentPosition -= itemWidth;
        }
        fila.style.transform = `translateX(${currentPosition}px)`;
    }

    // Establecer intervalo para el slider automático
    const interval = setInterval(moveSlider, 3000);

    // Detener el slider automático al pasar el mouse sobre el slider
    slider.addEventListener('mouseenter', () => clearInterval(interval));

    // Reanudar el slider automático al retirar el mouse del slider
    slider.addEventListener('mouseleave', () => setInterval(moveSlider, 5000));

    // Agregar eventos a los botones de navegación
    nextBtn.addEventListener('click', () => {
        moveSlider();
    });

    prevBtn.addEventListener('click', () => {
        if (currentPosition >= 0) {
            currentPosition = -totalWidth + itemWidth;
        } else {
            currentPosition += itemWidth;
        }
        fila.style.transform = `translateX(${currentPosition}px)`;
    });
});


// Inicializar el índice del slider
let currentIndex = 0;

function showUploadForm() {
    document.getElementById('uploadForm').style.display = 'block';
}

function deleteImage() {
    // Obtener la imagen actualmente mostrada
    const currentImage = document.querySelector('.slider img');

    if (!currentImage) {
        console.error('No se encontró ninguna imagen para eliminar.');
        return; // Salir de la función si no se encuentra ninguna imagen
    }

    // Obtener la ID de la imagen del atributo 'alt'
    const imageId = currentImage.alt;

    // Crear una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud POST para eliminar la imagen
    xhr.open('POST', `/delete/${imageId}`, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Configurar el manejo de la respuesta
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.error('Error al eliminar la imagen');
            alert('Error al eliminar la imagen');
        } else {
            alert('Imagen eliminada');
            window.location.href = '/homecrud';
        }
    };

    // Enviar la ID de la imagen en el cuerpo de la solicitud
    xhr.send(JSON.stringify({ imageId: imageId }));
}



// Función para avanzar al siguiente slide
function nextSlide() {
    const slider = document.querySelector('.slider');
    const slides = slider.querySelectorAll('img');
    const slideWidth = slides[0].clientWidth;

    currentIndex = (currentIndex + 1) % slides.length;
    const offset = -currentIndex * slideWidth;

    slider.style.transform = `translateX(${offset}px)`;
}

// Automáticamente avanzar al siguiente slide cada 3 segundos
setInterval(nextSlide, 3000);