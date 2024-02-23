<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistridulcesdelEje</title>
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
              <a href="secciones/vista_cursos.php">¿Quienes somos?</a>
            </li>
            <li>
              <a href="secciones/vista_cursos.php">Contactanos</a>
            </li>
          </ul>
          <div class="backgrount-search">
            <label for="product-search" class="txt-search">Busqueda</label>
            <input type="text" id="product-search" name="product-search" class="lbl-search">
          </div>
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
          <a href="secciones/vista_cursos.php">¿Quienes Somos?</a>
          <a href="secciones/vista_alumnos.php" target="pages">Productos</a>
          <a href="/home#contacto">Contactanos</a>

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
                $resultado= $conexion->query($query);
                while($row = $resultado->fetch_assoc()) {
            ?>
              <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">
            <?php      
                }
            ?>
              
            </div>
        </section>

    <!-- Sección Productos -->
    <section class="productos-section" id="productos">
        <h2 class="title-productos">PRODUCTOS DE ALTA CALIDAD</h2>

          <div class="slider-mobile">
              <div class="fila">

              <?php 
              include 'controladores/funciones.php';
              $productos = obtenerProductosConDescuento($conexion);

              foreach ($productos as $producto) { ?>
                <div class="item" onclick="cargarModal('<?php echo $producto['nombre']; ?>','<?php echo $producto['descripcion']; ?>','<?php echo $producto['precio']; ?>','data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>')">
                  <div class="contenedor-foto">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>">
                  </div>
                  <div class="contenedor-texto">
                    <p class="nombre"><?php echo $producto['nombre']; ?> <?php echo $producto['descuento']; ?>%</p>
                    <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                    <span class="precio">$<?php echo $producto['precio_descuento']; ?></span>
                  </div>
                </div>
              <?php } ?>
             
              </div>
                  <button class="prev-btn">&larr;</button>
                  <button class="next-btn">&rarr;</button>
          </div>
        <a href="productPage" class="btn-mas-productos">Más productos</a>
    </section>

    </section>
    <section class="title-Distridulces" id="title-Distridulces">
        DISTRIDULCES
    </section>

    <!-- Sección mision -->
    <section class="mision" id="section-aboutus">

        <div class="txt-content-mision">
            <img class="imgMision" src="img/home/img_mision.png" />
            <div class="content-txt-mision">
                <h2 class="txt-title-mision">MISION</h2>
                <p>
                    Llevar hasta los hogares colombianos los productos de nuestros aliados a través de nuestros
                    clientes, creando
                    oportunidad
                    de negocio para todos. Apoyados en una estructura de organización simple, recurso humano empoderado
                    y
                    tecnología de punta.
                    <br>
                    Desarrollamos un trabajo planeado y direccionado hacia el cumplimiento de indicadores para
                    satisfacción de
                    clientes y proveedores,
                    logrando así nuestra consolidación en el futuro.
                </p>
            </div>
        </div>

        <div class="txt-content-vision">
            <img class="img-vision" src="img/home/img_Vision.png" />
            <div class="content-txt-vision">
                <h2 class="txt-title-vision">VISION</h2>
                <p>
                    Ser en el año 2028 la empresa preferida
                    por los clientes del canal tradicional en el eje cafetero para la compra
                    de productos de consumo masivo y
                    consolidarnos como lideres en ventas y distribución.
                    ola
                </p>
            </div>


        </div>
    </section>

    <!-- Sección valores -->
    <section class="valores">

        <div class="txt-content-valores">
            <h2 class="txt-title-valores">VALORES</h2>
            <p>
                Ser en el año 2028 la empresa preferida
                por los clientes del canal tradicional en el eje cafetero para la compra
                de productos de consumo masivo y
                consolidarnos como lideres en ventas y distribución.
            </p>
        </div>
        <img class="img-valores" src="img/home/img_valores.jpg" />

    </section>

    <!-- Sección lineacorporativa -->
    <section class="lineacorporativa">

        <img class="img-lineacorporativa" src="img/home/img_lineacorporativa.jpg" />
        <div class="txt-content-lineacorporativa">
            <h2 class="txt-title-lineacorporativa">LINEA CORPORATIVA</h2>
            <p>
                Somos un equipo de personas soñadoras y apasionadas que ponemos amor a todo lo que hacemos.
                Así, logramos materializar cada anhelo y proyecto en nuestras vidas. si te gusta soñar y hacer
                esos sueños realidad ven y haz parte de la familia Distridulces.
            </p>
        </div>

    </section>

    <!-- Sección Contáctanos -->
    <section class="contacto" id="contacto">

        <h2>Contactanos</h2>
        <p>
            No dude en comunicarse con nosotros mediante el formulario de contacto a
            continuación. Estamos aquí para responder cualquier pregunta que pueda tener y
            brindarle el mejor servicio posible.
        </p>
        <!-- Formulario de contacto -->

        <form action="https://formsubmit.co/sebgameover5@gmail.com" method="POST">

            <table>
                <tr>
                    <td>
                        <input class="lbl-nombre" type="text" name="name" id="name" placeholder="NOMBRE">
                    </td>
                    <td>
                        <input class="lbl-telefono" type="tel" name="phone" id="phone" placeholder="TELEFONO">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="lbl-correo" type="email" name="email" id="email" placeholder="CORREO">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea class="lbl-mensaje" name="message" id="message" placeholder="MENSAJE"></textarea>
                    </td>
                </tr>
            </table>

            <input class="enviar-contact" type="submit" value="Enviar">

            <input type="hidden" name="_next" value="http://127.0.0.1:5501/">
            <input type="hidden" name="_captcha" value="false">
        </form>
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
