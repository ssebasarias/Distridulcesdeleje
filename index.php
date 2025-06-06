<?php
include 'configuraciones/db.php';
include 'controladores/funciones.php';
$categoria_id = isset($_GET['categoria']) ? $_GET['categoria'] : null;
$productos = obtenerProductosConDescuento($conexion);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Distridulces del Eje - Tu distribuidor de confianza para dulces y productos de consumo masivo en el eje cafetero">
    <meta name="keywords" content="dulces, distribuidora, eje cafetero, productos de consumo, mayorista">
    <meta name="author" content="Distridulces del Eje">
    <meta name="robots" content="index, follow">
    
    <title>Distridulces del Eje - Distribuidora de Dulces en el Eje Cafetero</title>
    
    <!-- Precargar recursos críticos -->
    <link rel="preload" href="styles/style.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" as="style">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    
    <!-- Open Graph tags para redes sociales -->
    <meta property="og:title" content="Distridulces del Eje">
    <meta property="og:description" content="Tu distribuidor de confianza para dulces y productos de consumo masivo en el eje cafetero">
    <meta property="og:image" content="img/header/logo.png">
    <meta property="og:url" content="https://distridulcesdeleje.com">
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

    <main>
        <!-- Sección Banner -->
        <section class="section-banner" id="section-banner" aria-label="Banner principal">
            <div class="slider-banner">
                <?php
                include("configuraciones/db.php");

                try {
                    $query = "SELECT * FROM imgsbanner";
                    $resultado = $conexion->query($query);
                    
                    if (!$resultado) {
                        throw new Exception($conexion->error);
                    }
                    
                    while ($row = $resultado->fetch_assoc()) {
                        $alt_text = htmlspecialchars($row['alt_text'] ?? 'Imagen promocional');
                        ?>
                        <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"
                             alt="<?php echo $alt_text; ?>"
                             loading="lazy">
                        <?php
                    }
                } catch (Exception $e) {
                    error_log("Error al cargar imágenes del banner: " . $e->getMessage());
                    echo "<p>No se pudieron cargar las imágenes del banner.</p>";
                }
                ?>
            </div>
        </section>

        <!-- Sección Productos -->
        <section class="slider" aria-label="Productos destacados">
            <div class="slide-track">
                <?php
                foreach ($productos as $producto) { ?>
                <div class="slide">
                    <div class="item">
                        <div class="contenedor-foto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>">
                        </div>
                        <div class="contenedor-texto">
                            <p class="nombre"><?php echo $producto['nombre']; ?></p>
                            <span class="precio">$<?php echo $producto['precio']; ?></span>
                            <span class="precio-descuento">$<?php echo $producto['precio_descuento']; ?></span>
                            <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                        </div>
                        <a href="productos.php">ver más productos</a>
                    </div>
                </div>
                
                <?php } ?>
                <?php
                foreach ($productos as $producto) { ?>
                <div class="slide">
                    <div class="item">
                        <div class="contenedor-foto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>">
                        </div>
                        <div class="contenedor-texto">
                            <p class="nombre"><?php echo $producto['nombre']; ?></p>
                            <span class="precio">$<?php echo $producto['precio']; ?></span>
                            <span class="precio-descuento">$<?php echo $producto['precio_descuento']; ?></span>
                            <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                        </div>
                        <a href="productos.php">ver más productos</a>
                    </div>
                </div>
                
                <?php } ?>
            </div>
        </section>

        <!-- Sección Misión y Visión -->
        <section class="mision" aria-label="Misión y Visión">
            <h2 class="title-Distridulces text-center display-4">DISTRIDULCES</h2>
            <div class="container-mision">
                <div class="row" style="margin-top:60px;">
                    <div class="col-md-6">
                        <img class="img-fluid" src="img/home/mision.png" alt="Imagen Misión" style="max-width: 200px; margin-top:30px;">
                        <div class="content-txt-mision mt-4">
                            <h2 class="custom-title text-center display-4">MISIÓN</h2>
                            <p class="txt-mision">
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
                            <h2 class="custom-title txt-title-vision mt-4">VISIÓN</h2>
                            <p class="txt-mision">
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
                    <div class="txt-container col-md-6">
                        <div>
                            <h2 class="custom-title text-center">VALORES</h2>
                            <p>
                            <strong>Integridad:</strong> Actuamos con honestidad, ética y transparencia en todas nuestras operaciones y relaciones comerciales.<br>

                            <strong>Calidad:</strong> Nos comprometemos a ofrecer productos y servicios de la más alta calidad, cumpliendo con los estándares más exigentes de la industria.<br>

                            <strong>Servicio al Cliente:</strong> Colocamos las necesidades y satisfacción del cliente en el centro de todo lo que hacemos, brindando un servicio personalizado y proactivo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección lineacorporativa -->
        <section class="lineacorporativa">
            <div class="container">
                <div class="row">
                    <div class="txt-container col-md-6">
                        <div>
                            <h2 class="custom-title text-center">LINEA CORPORATIVA</h2>
                            <p>
                                Somos un equipo de personas soñadoras y apasionadas que ponemos amor a todo lo que hacemos.
                                Así, logramos materializar cada anhelo y proyecto en nuestras vidas. si te gusta soñar y hacer
                                esos sueños realidad ven y haz parte de la familia Distridulces.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid float-left" src="img/home/img_lineacorporativa.jpg" />
                    </div>
                </div>
            </div>
        </section>

        <section class="slider">
            <div class="slide-track">
                <div class="slide">
                    <img src="./img/slider/1.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/3.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/4.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/2.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/5.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/7.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/6.png" alt="">
                </div>
                
                <div class="slide">
                    <img src="./img/slider/1.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/3.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/4.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/2.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/5.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/7.png" alt="">
                </div>
                <div class="slide">
                    <img src="./img/slider/6.png" alt="">
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
    </main>

    <footer class="footer" role="contentinfo">
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="js/main.js" defer></script>
</body>
</html>
