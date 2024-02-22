<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: index.php");
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Distridulces-admin</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="styles/style.css">

        
    </head>

    <body>
    <body>
    <div class="header-desktop">
        <svg class="background-logo" width="474" height="144" viewBox="0 0 474 144" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M0 0H474L456.883 11.3123C442.125 21.0648 431.486 35.9202 427.004 53.0315C422.49 70.2642 411.733 85.2044 396.821 94.9507L374.768 109.365C357.782 120.467 338.587 127.744 318.51 130.691L266.271 138.361L0 144V0Z"
            fill="#304C78" />
        </svg>
        <div class="header-info-box">
          <img class="sin-t-tulo-1-removebg-preview-1" src="img/header/logo.png" />
          <div class="info-box">
            <div class="info-adress">
              <div class="frame-61">
                <img class="address-icon" src="img/header/address-icon0.png" />
                <div class="frame-60">
                  <div class="address">Address</div>
                  <div class="_123-new-york-usa">123, New York, USA</div>
                </div>
              </div>
            </div>
            <div class="info-phone">
              <div class="frame-612">
                <img class="phone-icon" src="img/header/phone-icon0.png" />
                <div class="frame-60">
                  <div class="phone-number">Phone Number</div>
                  <div class="_650-123-1212">(650) 123-1212</div>
                </div>
              </div>
            </div>
            <div class="info-email">
              <div class="frame-613">
                <img class="email-icon" src="img/header/email-icon0.png" />
                <div class="frame-60">
                  <div class="email-us-here">Email Us Here</div>
                  <div class="example-gmail-com">example@gmail.com</div>
                </div>
              </div>
            </div>

            <a href="controladores/controlador_cerrar_sesion.php" class="a-logout">
              <div class="txt-cerrar-sesion">
              Hola!
              <?php
                echo $_SESSION["name"];
                ?>
                <strong style="color:#001f3f;">Cerrar sesion</strong>
                </div>
              <img class="user-img" src="img/header/user.png" />
            </a>
    
          </div>
        </div>
    
        <!-- Navbar -->
        <nav class="navbar">
          <ul class="options-navbar">
            <li>
              <a href="indexcrud.php">Administrar inicio</a>
            </li>
            <li>
              <a href="productCrud.php">Administrar productos</a>
            </li>
            <li>
              <a href="#">¿Quienes somos?</a>
            </li>
            <li>
              <a href="#">Contactanos</a>
            </li>
          </ul>
        </nav>
      </div>
    
      <div class="header-mobile">
        <img class="logo-mobile" src="img/header/img-logo-mobile.png" />
        <input type="checkbox" id="check">
        <label for="check" class="mostrar-menu">
          &#8801
        </label>
    
        <nav class="navbar-mobile">
          <img class="logo-mobile-navbar" src="img/header/img-logo-mobile.png" />
          <a href="index.php">- Inicio</a>
          <a href="secciones/vista_cursos.php">- ¿Quienes Somos?</a>
          <a href="secciones/vista_alumnos.php" target="pages">- Productos</a>
          <a href="/home#contacto">- Contactanos</a>

          <label for="check" class="esconder-menu">
            &#215
          </label>
          
                <div class="info-box-mobile">
                  <div class="info-adress">
                    <div class="frame-61">
                      <img class="address-icon" src="img/header/address-icon0.png" />
                      <div class="frame-60">
                        <div class="address">Address</div>
                        <div class="_123-new-york-usa">123, New York, USA</div>
                      </div>
                    </div>
                  </div>
                  <div class="info-phone">
                    <div class="frame-612">
                      <img class="phone-icon" src="img/header/phone-icon0.png" />
                      <div class="frame-60">
                        <div class="phone-number">Phone Number</div>
                        <div class="_650-123-1212">(650) 123-1212</div>
                      </div>
                    </div>
                  </div>
                  <div class="info-email">
                    <div class="frame-613">
                      <img class="email-icon" src="img/header/email-icon0.png" />
                      <div class="frame-60">
                        <div class="email-us-here">Email Us Here</div>
                        <div class="example-gmail-com">example@gmail.com</div>
                      </div>
                    </div>
                  </div>
                </div>
        </nav>
    </div>


        <h1 class="text-center text-secundary font-weigth-bold p-4">Administrador del banner</h1>
       
        <div class="p-3 table-responsive">
            <table class="table table-hover table-stripped">
            <thead class="big-dark text-white">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                include("configuraciones/db.php");

                $query = "SELECT * FROM imgsbanner";
                $resultado= $conexion->query($query);
                while($row = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"></td>
                        <td><a href="controladores/controlador_eliminar_imagen.php?nombre=<?php echo $row['nombre'];?>" 
                        class="btn btn-danger">Eliminar</a></td>
                    </tr>
                <?php      
                    }
                ?>
                </tbody>
            </table>
        </div>

        <form action="controladores/controlador_guardar_imagen.php" method="POST" enctype="multipart/form-data" class="p-3">
            <input type="text" name="nombre" placeholder="Nombre Imagen" Required>
            <input type="file"  class="btn btn-success" name="imagen" Required>
            <input type="submit" value="Subir Imagen" class="btn btn-primary">
        </form>

        <br><br>

        



        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>


