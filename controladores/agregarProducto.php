<?php

include("../configuraciones/db.php");

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$descuento = $_POST['descuento'];
$categoria_id = $_POST['categoria_id'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO productos (imagen,nombre,precio,descuento,descripcion,categoria_id) VALUES ('$imagen','$nombre','$precio','$descuento','$descripcion','$categoria_id')";

$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../productCrud.php");
} else {
    echo "No se pudo agregar el producto, por favor recargue la página"; 
}
