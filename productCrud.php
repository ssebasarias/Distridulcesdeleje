<?php

session_start();
if (!isset($_SESSION["id"])) {
    header("location: index.php");
}

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
    <title>Crud</title>
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

            <a href="controladores/controlador_cerrar_sesion.php" class="a-logout">
              <div class="txt-cerrar-sesion">
              Hola!
              <?php
                echo $_SESSION["name"];
                ?>
                <strong style="color:#001f3f;">Cerrar sesion</strong>
                </div>
              <img class="user-img" src="img/header/user.png" />
            </a>
    
          </div>
        </div>
    
        <!-- Navbar -->
        <nav class="navbar">
          <ul class="options-navbar">
            <li>
              <a href="indexcrud.php">Administrar inicio</a>
            </li>
            <li>
              <a href="productCrud.php">Administrar productos</a>
            </li>
            <li>
              <a href="#">¿Quienes somos?</a>
            </li>
            <li>
              <a href="#">Contactanos</a>
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
          <a href="index.php">- Inicio</a>
          <a href="secciones/vista_cursos.php">- ¿Quienes Somos?</a>
          <a href="productCrud.php">- Productos</a>
          <a href="/home#contacto">- Contactanos</a>

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
   
      
  <div class="btn-agg-seccion">
    <a class="agg-buttons" onclick="abrirVentanaAgregar()">
      <img src="./img/crud/add.png" alt="Icono">
      <span> +CATEGORIA </span>
    </a>
    <a class="agg-buttons" id="btn-add" onclick="abrirVentanaAgregar()">
      <img src="./img/crud/add.png"" alt=" Icono">
      <span> +PRODUCTO </span>
    </a>
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
        <?php foreach ($productos as $producto) { ?>
            <div class="item" onclick="cargarModal('<?php echo $producto['nombre']; ?>','<?php echo $producto['descripcion']; ?>','<?php echo $producto['precio']; ?>','data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>')">
              <div class="contenedor-foto">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>">
              </div>
              <div class="contenedor-texto">
                <p class="nombre"><?php echo $producto['nombre']; ?></p>
                <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                <span class="precio">$<?php echo $producto['precio']; ?></span>
              </div>
              <div class="contenedor-edit-delete">
                <a class="btn-edit" onclick="abrirVentanaEditar('<?php echo $producto['id']; ?>','<?php echo $producto['nombre']; ?>','<?php echo $producto['descripcion']; ?>','<?php echo $producto['precio']; ?>','<?php echo $producto['descuento']; ?>')">
                    <img src="./img/crud/edit.png" alt="Icono">
                </a>
                <a class="btn-delete" id="btn-delete" href="controladores/eliminarProducto.php?id=<?php echo $producto['id'];?>">
                    <img class="btn-delete" src="./img/crud/delete.png" alt="Icono">
                </a>
              </div>
            </div>
            <?php } ?>
          </div>
    </section>
  </div>

  <div class="product-detail" id="myModal" onclick="cerrarModal(event)">
    <div class="product-detail-close">
      <img src="./img/product/icon_close.png" alt="close" onclick="cerrarModal(event)">
    </div>
    <img src="" alt="" id="img">
    <div class="product-info">
      <p id="precio"></p>
      <p id="nombre"></p>
      <p id="descripcion"></p>
    </div>
  </div>

    <!-- Formulario para agregar nueva categoría -->
    <div id="formularioAgregarCategoria" class="modal" style="display: none;">
        <h3>Agregar Nueva Categoría</h3>
        <span id="cerrarVentana" onclick="cerrarVentana()">&times;</span>
        <form id="formAgregarCategoria" action="controladores/agregarCategoria.php" method="POST" enctype="multipart/form-data">
            <label for="nombreCategoria">Nombre de la Categoría:</label>
            <input type="text" id="nombreCategoria" name="nombre" required><br>
            <button type="submit">Agregar Categoría</button>
        </form>
    </div>

    <div id="formularioEditar" class="modal" style="display: none;">
      <div class="modal-content">
          <span id="cerrarVentanaEditar" class="close" onclick="cerrarVentana()">&times;</span>
          <h3>Editar Producto</h3>
          <form id="formEditarProducto" enctype="multipart/form-data" action="controladores/editarProducto.php" method="POST">
              <input type="hidden" id="idProductoEditar" name="id" value="">
              <label for="nombreEditar">Nombre:</label>
              <input type="text" id="nombreEditar" name="nombre" required><br>

              <label for="precioEditar">Precio:</label>
              <input type="number" id="precioEditar" name="precio" required><br>

              <label for="descripcionEditar">Descripción:</label>
              <textarea id="descripcionEditar" name="descripcion" required></textarea><br>

              <label for="descuentoEditar">Descuento:</label>
              <input type="number" id="descuentoEditar" name="descuento" required></input><br>

              <label for="imagenEditar">Imagen:</label>
              <input type="file" id="imagenEditar" name="imagen" accept="image/*">  

              <button type="submit">Guardar Cambios</button>
          </form>
      </div>
    </div>

    <div id="formularioAgregar" class="modal" style="display: none;">
      <div class="modal-content">
          <span id="cerrarVentanaAgregar" class="close" onclick="cerrarVentana()">&times;</span>
          <h3>Agregar Producto</h3>
          <form id="formAgregarProducto" enctype="multipart/form-data" action="controladores/agregarProducto.php" method="POST">
              <input type="hidden" id="idProductoAgregar" name="id" value="">

              <div class="mb-3">
                <label for="nombreAgregar" class="form-label">Nombre:</label>
                <input class="form-control" type="text" id="nombreAgregar" name="nombre" required><br>
              </div>

              <div class="mb-3">
              <label for="precioAgregar" class="form-label">Precio:</label>
              <input class="form-control" type="number" id="precioAgregar" name="precio" required><br>
              </div>

              <div class="mb-3">
              <label for="descripcionAgregar" class="form-label">Descripción:</label>
              <textarea class="form-control" id="descripcionAgregar" name="descripcion" required></textarea><br>
              </div>

              <div class="mb-3">
              <label for="descuentoAgregar" class="form-label">Descuento:</label>
              <input class="form-control" type="number" id="descuentoAgregar" name="descuento" required></input><br>
              </div>

              <div class="mb-3">
              <label for="categoriaSelect" class="form-label">Categoria:</label>
              <select id="categoriaSelect" name="categoria_id">
                <option value="">Selecciona una categoría</option>
                <?php
                foreach ($categorias as $categoria) {
                    echo "<option value='{$categoria['id']}'>{$categoria['nombre']}</option>";
                }
                ?>
              </select><br>
              </div>

              <div class="mb-3">
              <label for="imagenAgregar" class="form-label">Imagen:</label>
              <input class="form-control" type="file" id="imagenAgregar" name="imagen" accept="image/*" required>  
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>

    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</body>
<script src="./js/productCrud.js"></script>
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
</body>

</html>