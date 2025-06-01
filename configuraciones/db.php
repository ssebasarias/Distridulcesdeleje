<?php
// Cargar configuración desde archivo .env o variables de entorno
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: '';
$db_name = getenv('DB_NAME') ?: 'distridulcesdeleje';

try {
    // Crear conexión con manejo de errores
    $conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión: " . $conexion->connect_error);
    }

    // Configurar charset y collation
    $conexion->set_charset("utf8mb4");
    $conexion->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
    
    // Configurar zona horaria
    $conexion->query("SET time_zone = '-05:00'");
    
    // Configurar modo estricto SQL
    $conexion->query("SET SESSION sql_mode = 'STRICT_ALL_TABLES'");

} catch (Exception $e) {
    // Log del error
    error_log("Error en la base de datos: " . $e->getMessage());
    
    // En producción, mostrar un mensaje genérico
    if (getenv('ENVIRONMENT') === 'production') {
        die("Lo sentimos, ha ocurrido un error. Por favor, inténtelo más tarde.");
    } else {
        // En desarrollo, mostrar el error específico
        die($e->getMessage());
    }
}
?>
