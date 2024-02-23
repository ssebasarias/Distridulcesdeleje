<?php
include 'configuraciones/db.php';
// Función para obtener todas las categorías
function obtener_categorias($conexion) {
    $categorias_query = "SELECT * FROM categorias";
    $resultado_categorias = $conexion->query($categorias_query);
    $categorias = array();
    if ($resultado_categorias->num_rows > 0) {
        while ($row = $resultado_categorias->fetch_assoc()) {
            $categorias[] = $row;
        }
    }
    return $categorias;
}

// Función para obtener todos los productos o los productos de una categoría específica
function obtener_productos($conexion, $categoria_id = null) {
    $productos_query = "SELECT * FROM productos";
    if ($categoria_id !== null) {
        $productos_query .= " WHERE categoria_id = $categoria_id";
    }
    $resultado_productos = $conexion->query($productos_query);
    $productos = array();
    if ($resultado_productos->num_rows > 0) {
        while ($row = $resultado_productos->fetch_assoc()) {
            $productos[] = $row;
        }
    }
    return $productos;
}

function obtenerProductosConDescuento($conexion) {
    $productos_con_descuento = array();

    // Consulta para obtener los productos con descuento mayor que cero
    $query = "SELECT *, (precio - (precio * (descuento / 100))) AS precio_descuento FROM productos WHERE descuento > 0";

    // Ejecutar la consulta
    $resultado = $conexion->query($query);

    // Verificar si hay resultados
    if ($resultado->num_rows > 0) {
        // Recorrer los resultados y almacenarlos en un array
        while ($row = $resultado->fetch_assoc()) {
            $productos_con_descuento[] = $row;
        }
    }

    // Retornar el array de productos con descuento
    return $productos_con_descuento;
}


