<?php

include("../configuraciones/db.php");

$nombre =  $_POST['nombre'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO imgsbanner(nombre,imagen) VALUES ('$nombre','$imagen')";
$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../indexcrud.php");
} else {
    echo "No se inserto recague la pagina"; 
}

?>