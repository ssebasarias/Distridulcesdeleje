<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DistridulcesdelEje-Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <!-- Añadir FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="login-form">
        <form action="" method="POST" class="puts" id="loginForm" onsubmit="return validarFormulario()">
            <a href="index.php" id="cerrar-form" class="cerrar-form"> &#215;</a>
            <h1>Iniciar sesión</h1>
            
            <div id="mensajes-error">
                <?php
                include "configuraciones/db.php";  
                include "controladores/controlador_login.php";
                ?>
            </div>

            <p>¡Hola colaborador! Ingresa tus credenciales para entrar al área de administración.</p>
            
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="user" id="user" placeholder="Usuario" required minlength="3">
                <span class="error-message" id="user-error"></span>
            </div>
            
            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" id="pass" placeholder="Contraseña" required minlength="6">
                <span class="error-message" id="pass-error"></span>
                <i class="fas fa-eye" id="togglePassword"></i>
            </div>

            <input type="submit" name="btn-login" class="btn-login" value="Iniciar sesión">
        </form>
    </div>

    <script>
        function validarFormulario() {
            let isValid = true;
            const user = document.getElementById('user');
            const pass = document.getElementById('pass');
            const userError = document.getElementById('user-error');
            const passError = document.getElementById('pass-error');

            // Limpiar mensajes de error previos
            userError.textContent = '';
            passError.textContent = '';

            // Validar usuario
            if (user.value.trim().length < 3) {
                userError.textContent = 'El usuario debe tener al menos 3 caracteres';
                isValid = false;
            }

            // Validar contraseña
            if (pass.value.length < 6) {
                passError.textContent = 'La contraseña debe tener al menos 6 caracteres';
                isValid = false;
            }

            return isValid;
        }

        // Toggle para mostrar/ocultar contraseña
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passInput = document.getElementById('pass');
            const type = passInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>