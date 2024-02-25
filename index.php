<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistridulcesdelEje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="header-desktop">
        <svg class="background-logo" width="474" height="144" viewBox="0 0 474 144" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M0 0H474L456.883 11.3123C442.125 21.0648 431.486 35.9202 427.004 53.0315C422.49 70.2642 411.733 85.2044 396.821 94.9507L374.768 109.365C357.782 120.467 338.587 127.744 318.51 130.691L266.271 138.361L0 144V0Z"
            fill="#304C78" />
        </svg>
        <div class="header-info-box">
          <img class="sin-t-tulo-1-removebg-preview-1" src="img/header/logo.png" />
          <div class="info-box">
            <div class="info-adress">
              <div class="frame-61">
                <img class="address-icon" src="img/header/address-icon0.png" />
                <div class="frame-60">
                  <div class="address">Address</div>
                  <div class="_123-new-york-usa">123, New York, USA</div>
                </div>
              </div>
            </div>
            <div class="info-phone">
              <div class="frame-612">
                <img class="phone-icon" src="img/header/phone-icon0.png" />
                <div class="frame-60">
                  <div class="phone-number">Phone Number</div>
                  <div class="_650-123-1212">(650) 123-1212</div>
                </div>
              </div>
            </div>
            <div class="info-email">
              <div class="frame-613">
                <img class="email-icon" src="img/header/email-icon0.png" />
                <div class="frame-60">
                  <div class="email-us-here">Email Us Here</div>
                  <div class="example-gmail-com">example@gmail.com</div>
                </div>
              </div>
            </div>

            <a href="login.php" class="a-logout">
              <div class="txt-iniciar-sesion"><strong style="color:#001f3f;">Iniciar Sesion</strong></div>
              <img class="user-img" src="img/header/user.png" />
            </a>
    
          </div>
        </div>
    
        <!-- Navbar -->
        <nav class="navbar">
          <ul class="options-navbar">
            <li>
              <a href="index.php">Inicio</a>
            </li>
            <li>
              <a href="productos.php">Productos</a>
            </li>
            <li>
              <a href="#title-Distridulces">¿Quienes somos?</a>
            </li>
            <li>
              <a href="#contacto">Contactanos</a>
            </li>
          </ul>
          
        </nav>
      </div>
    
      <div class="header-mobile">
        <img class="logo-mobile" src="img/header/img-logo-mobile.png" />
        <input type="checkbox" id="check">
        <label for="check" class="mostrar-menu">
          &#8801
        </label>
    
        <nav class="navbar-mobile">
          <img class="logo-mobile-navbar" src="img/header/img-logo-mobile.png" />
          <a href="index.php">Inicio</a>
          <a href="#title-Distridulces">¿Quienes Somos?</a>
          <a href="productos.php">Productos</a>
          <a href="#contacto">Contactanos</a>

          <label for="check" class="esconder-menu">
            &#215
          </label>
          
                <div class="info-box-mobile">
                  <div class="info-adress">
                    <div class="frame-61">
                      <img class="address-icon" src="img/header/address-icon0.png" />
                      <div class="frame-60">
                        <div class="address">Address</div>
                        <div class="_123-new-york-usa">123, New York, USA</div>
                      </div>
                    </div>
                  </div>
                  <div class="info-phone">
                    <div class="frame-612">
                      <img class="phone-icon" src="img/header/phone-icon0.png" />
                      <div class="frame-60">
                        <div class="phone-number">Phone Number</div>
                        <div class="_650-123-1212">(650) 123-1212</div>
                      </div>
                    </div>
                  </div>
                  <div class="info-email">
                    <div class="frame-613">
                      <img class="email-icon" src="img/header/email-icon0.png" />
                      <div class="frame-60">
                        <div class="email-us-here">Email Us Here</div>
                        <div class="example-gmail-com">example@gmail.com</div>
                      </div>
                    </div>
                  </div>
                </div>
        </nav>
    </div>
<!-- Sección Banner -->
<section class="section-banner" id="section-banner">
  <div class="slider">
    
  <?php

  include("configuraciones/db.php");

  $query = "SELECT * FROM imgsbanner";
  $resultado = $conexion->query($query);
  while ($row = $resultado->fetch_assoc()) {
    ?>
      <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">
  <?php
  }
  ?>
    
  </div>
</section>

<!-- Sección Productos -->
<section class="product-slider">
  <h2>Productos al mejor precio</h2>
  <div class="slider-container">
    <iframe src="./slider.php"></iframe>
  </div>
  <a href="productPage" class="btn-mas-productos btn btn-primary">Más productos</a>
</section>

<section class="title-Distridulces" id="title-Distridulces">
  
</section>

<section class="mision">
  <h2 class="title-Distridulces text-center display-4">DISTRIDULCES</h2>
    <div class="container-mision">
        <div class="row" style="margin-top:60px;">
            <div class="col-md-6">
                <img class="img-fluid" src="img/home/mision.png" alt="Imagen Misión" style="max-width: 200px; margin-top:30px;">
                <div class="content-txt-mision mt-4">
                    <h2 class="txt-title-mision mt-4">MISIÓN</h2>
                    <p>
                        Llevar hasta los hogares colombianos los productos de nuestros aliados a través de nuestros
                        clientes, creando oportunidad de negocio para todos. Apoyados en una estructura de organización
                        simple, recurso humano empoderado y tecnología de punta.
                        <br>
                        Desarrollamos un trabajo planeado y direccionado hacia el cumplimiento de indicadores para
                        satisfacción de clientes y proveedores, logrando así nuestra consolidación en el futuro.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="img/home/vision.png" alt="Imagen Visión" style="max-width: 200px; margin-top:30px;">
                <div class="content-txt-vision mt-4">
                    <h2 class="txt-title-vision mt-4">VISIÓN</h2>
                    <p>
                        Ser en el año 2028 la empresa preferida por los clientes del canal tradicional en el eje
                        cafetero para la compra de productos de consumo masivo y consolidarnos como líderes en ventas y
                        distribución.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección valores -->
<section class="valores">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="img/home/img_valores.jpg" />
            </div>
            <div class="col-md-6">
                <h2 class="text-center">VALORES</h2>
                <p>
                <strong>Integridad:</strong> Actuamos con honestidad, ética y transparencia en todas nuestras operaciones y relaciones comerciales.<br>

                <strong>Calidad:</strong> Nos comprometemos a ofrecer productos y servicios de la más alta calidad, cumpliendo con los estándares más exigentes de la industria.<br>

                <strong>Servicio al Cliente:</strong> Colocamos las necesidades y satisfacción del cliente en el centro de todo lo que hacemos, brindando un servicio personalizado y proactivo.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Sección lineacorporativa -->
<section class="lineacorporativa">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">LINEA CORPORATIVA</h2>
                <p>
                    Somos un equipo de personas soñadoras y apasionadas que ponemos amor a todo lo que hacemos.
                    Así, logramos materializar cada anhelo y proyecto en nuestras vidas. si te gusta soñar y hacer
                    esos sueños realidad ven y haz parte de la familia Distridulces.
                </p>
            </div>
            <div class="col-md-6">
                <img class="img-fluid float-left" src="img/home/img_lineacorporativa.jpg" />
            </div>
        </div>
    </div>
</section>

    <!-- Sección Contáctanos -->
    <section class="contacto" id="contacto" style="margin: 50px 0;">
    <div class="container" style="width: 800px;">
        <h2>Contactanos</h2>
        <p>No dude en comunicarse con nosotros mediante el formulario de contacto a continuación. Estamos aquí para responder cualquier pregunta que pueda tener y brindarle el mejor servicio posible.</p>
        
        <form action="https://formsubmit.co/danielgoezparra@gmail.com" method="POST">
            <div class="row mb-3">
                <div class="col">
                    <input class="form-control" type="text" name="name" id="name" placeholder="NOMBRE">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input class="form-control" type="tel" name="phone" id="phone" placeholder="TELEFONO">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input class="form-control" type="email" name="email" id="email" placeholder="CORREO">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <textarea class="form-control" name="message" id="message" placeholder="MENSAJE"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="btn btn-primary" type="submit" value="Enviar">
                </div>
            </div>
            <input type="hidden" name="_next" value="http://127.0.0.1:5501/">
            <input type="hidden" name="_captcha" value="false">
        </form>
    </div>
</section>

    <footer>
        <div class="footer">
            <div class="social-icons">
                <a href=""><img class="img-instagram" src="img/footer/img-instagram0.png" /></a>
                <a href=""><img class="img-facebook" src="img/footer/img-facebook0.png" /></a>
                <a href=""><img class="img-whatapp" src="img/footer/img-whatapp0.png" /></a>
            </div>
            <div class="txt-futer">
                <div class="txt-copy">© 2024 - DISTRIDULCES.</div>
                <div class="txt-footers">
                    <a href="" class="txt-footer1">Politicas</a>
                    <a href="" class="txt-footer2">Terminos y condiciones</a>
                    <a href="" class="txt-footer3">Contactanos</a>
                    <a href="" class="txt-footer4">Ubicanos</a>
                    <a href="" class="txt-footer5">Productos</a>
                    <a href="" class="txt-footer6">Quienes somos</a>
                </div>
            </div>
            <img class="img-logo" src="img/footer/img-logo0.png" />
        </div>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
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
</script>
</html>

    <body>
    </body>
</html>
