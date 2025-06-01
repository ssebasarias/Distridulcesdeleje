<?php
session_start();

// Definir constantes para mensajes de error
define('ERROR_CAMPOS_VACIOS', 'Por favor, complete todos los campos.');
define('ERROR_CREDENCIALES', 'Usuario o contraseña incorrectos.');
define('ERROR_SISTEMA', 'Error del sistema. Por favor, intente más tarde.');

// Función para limpiar datos de entrada
function limpiarDatos($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

if (!empty($_POST["btn-login"])) {
    if (!empty($_POST["user"]) && !empty($_POST["pass"])) {
        try {
            $user = limpiarDatos($_POST["user"]);
            $pass = $_POST["pass"];

            // Usar prepared statement para prevenir inyección SQL
            $stmt = $conexion->prepare("SELECT * FROM users WHERE user = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($datos = $resultado->fetch_object()) {
                // Verificar si necesitamos actualizar el hash de la contraseña
                if (strlen($datos->pass) == 32) { // Si es MD5
                    // La contraseña está en MD5, verificar y actualizar a password_hash
                    if (md5($pass) === $datos->pass) {
                        // Actualizar a nuevo hash
                        $nuevo_hash = password_hash($pass, PASSWORD_DEFAULT);
                        $stmt_update = $conexion->prepare("UPDATE users SET pass = ? WHERE id = ?");
                        $stmt_update->bind_param("si", $nuevo_hash, $datos->id);
                        $stmt_update->execute();
                        
                        // Iniciar sesión
                        $_SESSION["id"] = $datos->id;
                        $_SESSION["name"] = $datos->name;
                        header("location: indexcrud.php");
                        exit();
                    }
                } else {
                    // Verificar con password_verify
                    if (password_verify($pass, $datos->pass)) {
                        $_SESSION["id"] = $datos->id;
                        $_SESSION["name"] = $datos->name;
                        header("location: indexcrud.php");
                        exit();
                    }
                }
            }
            
            // Si llegamos aquí, las credenciales son incorrectas
            $_SESSION['error_login'] = ERROR_CREDENCIALES;
            
        } catch (Exception $e) {
            $_SESSION['error_login'] = ERROR_SISTEMA;
            // Log del error para el administrador
            error_log("Error en login: " . $e->getMessage());
        }
    } else {
        $_SESSION['error_login'] = ERROR_CAMPOS_VACIOS;
    }
}

// Si hay un error, redirigir al login
if (isset($_SESSION['error_login'])) {
    $error = $_SESSION['error_login'];
    unset($_SESSION['error_login']); // Limpiar el mensaje de error
    echo "<div class='alert alert-danger'>$error</div>";
}
?>