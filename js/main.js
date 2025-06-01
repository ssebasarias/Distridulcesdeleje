// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    initializeSliders();
    initializeMobileMenu();
    initializeFormValidation();
});

// Inicializar todos los sliders
function initializeSliders() {
    initializeProductSlider();
    initializeBannerSlider();
}

// Slider de productos
function initializeProductSlider() {
    const fila = document.querySelector('.slide-track');
    if (!fila) return;

    const items = fila.querySelectorAll('.slide');
    if (!items.length) return;

    const itemWidth = items[0].offsetWidth;
    const totalWidth = itemWidth * items.length;
    let currentPosition = 0;

    function moveSlider() {
        if (currentPosition <= -totalWidth) {
            currentPosition = 0;
        } else {
            currentPosition -= itemWidth;
        }
        fila.style.transform = `translateX(${currentPosition}px)`;
    }

    // Slider automático
    const interval = setInterval(moveSlider, 3000);

    // Detener el slider cuando el usuario interactúa
    fila.addEventListener('mouseenter', () => clearInterval(interval));
    fila.addEventListener('mouseleave', () => setInterval(moveSlider, 3000));
}

// Slider del banner
function initializeBannerSlider() {
    const slider = document.querySelector('.slider-banner');
    if (!slider) return;

    const slides = slider.querySelectorAll('img');
    if (!slides.length) return;

    let currentIndex = 0;
    const slideWidth = slides[0].clientWidth;

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        const offset = -currentIndex * slideWidth;
        slider.style.transform = `translateX(${offset}px)`;
    }

    // Slider automático
    setInterval(nextSlide, 3000);

    // Navegación táctil para dispositivos móviles
    let touchStartX = 0;
    let touchEndX = 0;

    slider.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    });

    slider.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchStartX - touchEndX > swipeThreshold) {
            nextSlide(); // Swipe izquierda
        } else if (touchEndX - touchStartX > swipeThreshold) {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            const offset = -currentIndex * slideWidth;
            slider.style.transform = `translateX(${offset}px)`;
        }
    }
}

// Menú móvil
function initializeMobileMenu() {
    const menuToggle = document.querySelector('.mostrar-menu');
    const menuClose = document.querySelector('.esconder-menu');
    const navbar = document.querySelector('.navbar-mobile');

    if (!menuToggle || !menuClose || !navbar) return;

    menuToggle.addEventListener('click', () => {
        navbar.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    menuClose.addEventListener('click', () => {
        navbar.classList.remove('active');
        document.body.style.overflow = '';
    });

    // Cerrar menú al hacer clic en un enlace
    const menuLinks = navbar.querySelectorAll('a');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            navbar.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
}

// Validación de formularios
function initializeFormValidation() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
            }
        });
    });
}

function validateForm(form) {
    let isValid = true;
    const inputs = form.querySelectorAll('input[required]');

    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            showError(input, 'Este campo es requerido');
        } else {
            clearError(input);
        }

        // Validación específica por tipo
        if (input.type === 'email' && !validateEmail(input.value)) {
            isValid = false;
            showError(input, 'Por favor ingrese un email válido');
        }

        if (input.type === 'tel' && !validatePhone(input.value)) {
            isValid = false;
            showError(input, 'Por favor ingrese un teléfono válido');
        }
    });

    return isValid;
}

function showError(input, message) {
    const errorDiv = input.nextElementSibling?.classList.contains('error-message') 
        ? input.nextElementSibling 
        : createErrorDiv();
    
    errorDiv.textContent = message;
    if (!input.nextElementSibling?.classList.contains('error-message')) {
        input.parentNode.insertBefore(errorDiv, input.nextSibling);
    }
    input.classList.add('error');
}

function clearError(input) {
    const errorDiv = input.nextElementSibling;
    if (errorDiv?.classList.contains('error-message')) {
        errorDiv.remove();
    }
    input.classList.remove('error');
}

function createErrorDiv() {
    const div = document.createElement('div');
    div.className = 'error-message';
    return div;
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validatePhone(phone) {
    return /^\d{10}$/.test(phone.replace(/\D/g, ''));
} 