<?php
include 'config/conexion.php';

// Obtener los datos del producto a actualizar del cuerpo de la solicitud POST
$datos = $_POST;

// Extraer los datos del producto
$id = $datos['id'];
$nuevoNombre = $conexion->real_escape_string($datos['nombre']);
$nuevoPrecio = $conexion->real_escape_string($datos['precio']);
$nuevaDescripcion = $conexion->real_escape_string($datos['descripcion']);

// Verificar si se ha subido una nueva imagen
if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Leer el contenido de la imagen y convertirlo a base64
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    $imagen_base64 = base64_encode($imagen);

    // Query para actualizar el producto en la base de datos, incluyendo la imagen
    $query = "UPDATE productos SET nombre='$nuevoNombre', precio=$nuevoPrecio, descripcion='$nuevaDescripcion', imagen='$imagen_base64' WHERE id=$id";
} else {
    // Query para actualizar el producto en la base de datos sin la imagen
    $query = "UPDATE productos SET nombre='$nuevoNombre', precio=$nuevoPrecio, descripcion='$nuevaDescripcion' WHERE id=$id";
}

// Ejecutar la consulta
if ($conexion->query($query) === TRUE) {
    // Si la actualización fue exitosa, enviar una respuesta con código 200 (OK)
    http_response_code(200);
} else {
    // Si hubo un error en la actualización, enviar una respuesta con código 500 (Error interno del servidor)
    http_response_code(500);
}

// Cerrar la conexión
$conexion->close();
?>
