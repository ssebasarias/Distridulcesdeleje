<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistridulcesdelEje-Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <div class="login-form">
        <form action="" method="POST" class="puts">
            
            <a href="index.php" id="cerrar-form" class="cerrar-form"> &#215</a>
            <h1>Iniciar sesion</h1>
            <?php
            include "configuraciones/bd.php";  
            include "controladores/controlador_login.php";
            ?>
            <p>¡Hola colaborador! Ingresa tus credenciales para entrar al area de administración.</p>
            <div class="input-box">
                <input type="text" name="user" id="user" placeholder="User">
            </div>
            <div class="input-box">
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>
            <input type="submit" name="btn-login" class="btn-login" value="Iniciar sesion">

        </form>
    </div>
</body>

</html>