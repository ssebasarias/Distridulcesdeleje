<?php

include("../configuraciones/db.php");

$nombre = $_REQUEST['nombre'];

$sql_delete_productos = "DELETE FROM productos WHERE categoria_id IN (SELECT id FROM categorias WHERE nombre = '$nombre')";
$resultado_delete_productos = $conexion->query($sql_delete_productos);

if ($resultado_delete_productos) {
    $sql_delete_categoria = "DELETE FROM categorias WHERE nombre = '$nombre'";
    $resultado_delete_categoria = $conexion->query($sql_delete_categoria);

    if ($resultado_delete_categoria) {
        header("Location: ../productCrud.php");
    } else {
        echo "No se eliminó la categoría. Recargue la página.";
    }
} else {
    echo "No se eliminaron los productos. Recargue la página.";
}

?>
