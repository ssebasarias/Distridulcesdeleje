<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/slider.css">
    <title>Document</title>
</head>
<body>

    <!-- Sección Productos -->
<section class="mostrador" id="mostrador">
<?php
      include 'controladores/funciones.php';
      $categoria_id = isset($_GET['categoria']) ? $_GET['categoria'] : null;
      $productos = obtenerProductosConDescuento($conexion);

      foreach ($productos as $producto) { ?>

            <div class="item">
              <div class="contenedor-foto">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="<?php echo $producto['nombre']; ?>">
              </div>
              <div class="contenedor-texto">
                <p class="nombre"><?php echo $producto['nombre']; ?></p>
                <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                <span class="precio">$<?php echo $producto['precio']; ?></span>
                <span class="precio">$<?php echo $producto['precio_descuento']; ?></span>
              </div>
            </div>
            <?php } ?>
    </section>


</body>
</html>
