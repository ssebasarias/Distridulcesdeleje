<?php 

include("../configuraciones/db.php");

$id = $_REQUEST['id'];

$query = "DELETE FROM productos WHERE id = '$id' ";
$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../productCrud.php");
} else {
    echo "No se elimino recargue la pagina";
}


?>