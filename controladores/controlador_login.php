<?php
session_start();
if (!empty($_POST["btn-login"])) {
    if (!empty($_POST["user"]) and !empty($_POST["pass"]) ) {
        $user = $_POST["user"];
        $pass = md5($_POST["pass"]);
        $sql = $conexion->query("SELECT * FROM users WHERE user= '$user' and pass= '$pass' ");
        if ($datos=$sql->fetch_object()) {
            $_SESSION["id"]=$datos->id;
            $_SESSION["name"]=$datos->name;
            header("location: indexcrud.php");
        } else {
            echo "Acceso denegado";
        }
        

    } else {
        echo "campos vacios";
    }
    
}

?>