<?php

include("../configuraciones/db.php");

$nombre = $_POST['nombre'];

$query = "INSERT INTO categorias (nombre) VALUES ('$nombre')";

$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../productCrud.php");
} else {
    echo "No se pudo agregar el producto, por favor recargue la página"; 
}
