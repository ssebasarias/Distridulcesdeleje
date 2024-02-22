<?php 

include("../configuraciones/db.php");

$nombre = $_REQUEST['nombre'];

$query = "DELETE FROM imgsbanner WHERE nombre = '$nombre' ";
$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../indexcrud.php");
} else {
    echo "No se elimino recargue la pagina";
}


?>