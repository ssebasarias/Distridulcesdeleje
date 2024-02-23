<?php
include 'configuraciones/db.php';
include 'controladores/funciones.php';

// Obtener el parámetro de la categoría, si está presente
$categoria_id = isset($_GET['categoria']) ? $_GET['categoria'] : null;

// Obtener todas las categorías
$categorias = obtener_categorias($conexion);

// Obtener todos los productos o los productos de la categoría seleccionada
$productos = obtener_productos($conexion, $categoria_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link rel="stylesheet" href="./styles/productPage.css">
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
      <img class="sin-t-tulo-1-removebg-preview-1" src="./img/header/logo.png" />
      <div class="info-box">
        <div class="info-adress">
          <div class="frame-61">
            <img class="address-icon" src="./img/header/address-icon0.png" />
            <div class="frame-60">
              <div class="address">Address</div>
              <div class="_123-new-york-usa">123, New York, USA</div>
            </div>
          </div>
        </div>
        <div class="info-phone">
          <div class="frame-612">
            <img class="phone-icon" src="./img/header/phone-icon0.png" />
            <div class="frame-60">
              <div class="phone-number">Phone Number</div>
              <div class="_650-123-1212">(650) 123-1212</div>
            </div>
          </div>
        </div>
        <div class="info-email">
          <div class="frame-613">
            <img class="email-icon" src="./img/header/email-icon0.png" />
            <div class="frame-60">
              <div class="email-us-here">Email Us Here</div>
              <div class="example-gmail-com">example@gmail.com</div>
            </div>
          </div>
        </div>

        <a href="login" class="a-logout">
          <div class="txt-iniciar-sesion"><strong style="color:#001f3f;">Iniciar Sesion</strong></div>
          <img class="user-img" src="./img/header/user.png" />
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
          <a href="#">¿Quienes somos?</a>
        </li>
        <li>
          <a href="#">Contactanos</a>
        </li>
      </ul>
      <div class="backgrount-search">
        <label for="product-search" class="txt-search">Busqueda</label>
        <input type="text" id="product-search" name="product-search" class="lbl-search">
      </div>
    </nav>
  </div>

  <div class="header-mobile">
    <img class="logo-mobile" src="./img/header/img-logo-mobile.png" />
    <input type="checkbox" id="check">
    <label for="check" class="mostrar-menu">
      &#8801
    </label>

    <nav class="navbar-mobile">
      <img class="logo-mobile-navbar" src="./img/header/img-logo-mobile.png" />
      <a href="/home">- Inicio</a>
      <a href="/home#title-Distridulces">- ¿Quienes Somos?</a>
      <a href="productPage" target="pages">- Productos</a>
      <a href="/home#contacto">- Contactanos</a>
      <a href="login">Iniciar sesion</a>
      <label for="check" class="esconder-menu">
        &#215
      </label>

      <div class="info-box-mobile">
        <div class="info-adress">
          <div class="frame-61">
            <img class="address-icon" src="./img/header/address-icon0.png" />
            <div class="frame-60">
              <div class="address">Address</div>
              <div class="_123-new-york-usa">123, New York, USA</div>
            </div>
          </div>
        </div>
        <div class="info-phone">
          <div class="frame-612">
            <img class="phone-icon" src="./img/header/phone-icon0.png" />
            <div class="frame-60">
              <div class="phone-number">Phone Number</div>
              <div class="_650-123-1212">(650) 123-1212</div>
            </div>
          </div>
        </div>
        <div class="info-email">
          <div class="frame-613">
            <img class="email-icon" src="./img/header/email-icon0.png" />
            <div class="frame-60">
              <div class="email-us-here">Email Us Here</div>
              <div class="example-gmail-com">example@gmail.com</div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

<!-- Sección de categorías -->
<section class="category-menu">
    <h2>Categorías</h2>
    <ul id="categoryList">
      <?php 
        foreach ($categorias as $categoria) {
          echo "<li><a href='/productos.php?categoria={$categoria['id']}'>{$categoria['nombre']}</a></li>";
        }
      ?>
    </ul>
  </section>

  <div class="cotenedor-productpage">
    <section class="" id="contenido">
      <div class="mostrador" id="mostrador">
        <?php
        foreach ($productos as $producto) { ?>
          <div class="item" onclick="cargarModal('<?php echo $producto['nombre']; ?>','<?php echo $producto['descripcion']; ?>','<?php echo $producto['precio']; ?>','data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>')">
            <div class="contenedor-foto">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>">
            </div>
            <div class="contenedor-texto">
              <p class="nombre"><?php echo $producto['nombre']; ?></p>
              <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
              <span class="precio">$<?php echo $producto['precio']; ?></span>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  </div>

  <div class="product-detail" id="myModal" onclick="cerrarModal(event)">
    <div class="product-detail-close">
      <img src="./img/product//icon_close.png" alt="close" onclick="cerrarModal(event)">
    </div>
    <img src="" alt="" id="img">
    <div class="product-info">
      <p id="precio"></p>
      <p id="nombre"></p>
      <p id="descripcion"></p>
    </div>
  </div>



</body>
<script src="./js/productPage.js"></script>
</body>

</html>