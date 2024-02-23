<?php

include("../configuraciones/db.php");

$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$descuento = $_POST['descuento'];
$categoria_id = $_POST['categoria_id'];

// Verificar si se ha subido una imagen
if ($_FILES['imagen']['size'] > 0) {
    // Si se ha subido una imagen, guardarla en la base de datos
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $query = "UPDATE productos SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion', descuento = '$descuento', categoria_id = '$categoria_id', imagen = '$imagen' WHERE id = '$id'";
} else {
    // Si no se ha subido una imagen, omitirla en la actualización
    $query = "UPDATE productos SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion', descuento = '$descuento', categoria_id = '$categoria_id' WHERE id = '$id'";
}

$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../productCrud.php");
} else {
    echo "No se pudo actualizar el producto, por favor recargue la página"; 
}
