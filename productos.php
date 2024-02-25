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
  <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
    />
  <link rel="stylesheet" href="./styles/productCrud.css">
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
          <a href="index.php#title-Distridulces">¿Quienes somos?</a>
        </li>
        <li>
          <a href="index.php#contacto">Contactanos</a>
        </li>
      </ul>
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
      <a href="index.php">Inicio</a>
      <a href="index.php#title-Distridulces">¿Quienes Somos?</a>
      <a href="productPage">Productos</a>
      <a href="index.php#contacto">Contactanos</a>
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

  <div class="cotenedor-productpage">
  <section class="category-menu">
  <h2>Categorías</h2>
  <ul class="list-group list-group-flush">
    <li class ="list-group-item"><a class="icon-link icon-link-hover text-decoration-none" style="--bs-link-hover-color-rgb: 255, 215, 0;" href="productos.php">Todos los productos</a></li>
    <?php
      foreach ($categorias as $categoria) {
        echo "<li class ='list-group-item'><a class='icon-link icon-link-hover text-decoration-none' style='--bs-link-hover-color-rgb: 255, 215, 0;' href='/productos.php?categoria={$categoria['id']}'>{$categoria['nombre']}</a></li>";
      }
      ?>
    </section>
    <section class="mostrador" id="mostrador">
    <div class="dropdown">
        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Categorias
        </button>
        <ul class="dropdown-menu">
        <li class ="dropdown-item" href="productos.php">Todos los productos</a></li>
          <?php
          foreach ($categorias as $categoria) {
            echo "<li><a class='dropdown-item' href='/productos.php?categoria={$categoria['id']}'>{$categoria['nombre']}</a></li>";
          }
          ?>
        </ul>
      </div>
      <?php foreach ($productos as $producto) { ?>
        <div style="width: 12rem; height: 16rem;" data-bs-toggle="modal" data-bs-target="#detalleProductos" class="card border border-dark rounded btn  shadow lift" style="width: 12rem;" onclick="cargarModal('<?php echo $producto['nombre']; ?>','<?php echo $producto['descripcion']; ?>','<?php echo $producto['precio']; ?>','data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>')">
        <div class="d-flex justify-content-center" style="width: 100%; height: 10rem;">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>" class="card-img-top">
        </div>  
          <div class="card-body d-flex flex-column justify-content-end">
            <p class="card-text"><?php echo $producto['nombre']; ?></p>
            <span class="card-text text-primary">$<?php echo $producto['precio']; ?></span>
          </div>
        </div>
      <?php } ?>
    </section>
  </div>

  <div class="modal fade" id="detalleProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle del producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="myModal">
          <div class="d-flex justify-content-center">
            <img class="img-fluid" src="" alt="" id="img">
          </div>
          <div class="product-info mt-3">
            <p class="text-primary fs-2" id="precio"></p>
            <p class="fs-3" id="nombre"></p>
            <p class="fs-5" id="descripcion"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ver más productos</button>
      </div>
    </div>
  </div>
</div>


</body>
<script src="./js/productPage.js"></script>
</body>
<script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

</html>