<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="#"/>
    <!--Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit-no">
    <title>CFE Distribución Tuxtepec | Supervisión de obras</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--Iconos de Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">    
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">

</head>
<body>
    <div id="login" >
    <header>
      <div class="logo">
          <nav class="navbar navbar-expand-lg bg-light">
            <img class="logoimg" src='img/logodistribucion-02.png'>
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="superobras.php">Supervisión de obras</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="pdf/formatos.pdf">Formatos</a>
                  </li>
                  <li>
                    <a class="nav-link" href="pdf/Manual_de_usuario.pdf" role="button" title="Manual de usuario"><i class="bi bi-patch-question"></i></a>
                  </li>                  
                </ul>
              </div>
          </div>
        </nav>           
      </div>
    </header>


        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-colum" class="col-md-6">
                    <div id="login-box" class="col-md-12 bg-light text-dark">
                        <form id="form-login" class="form" action="" method="post">                            
                            <i class="bi bi-person-circle" style="font-size: 70px; padding-left: 80px;"></i>
                            <div class="form-group">
                                <!--<label for="usuario" class="text-dark">Usuario</label>-->
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                            </div>
                            <br />
                            <div class="form-group">
                                <!--<label for="password" class="text-dark">Contraseña</label>-->
                                <input type="password" name="password" id="password" class="form-control"  placeholder="Contraseña">
                            </div>
                            <br />     
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Entrar">
                            </div>                                                    
                        </form>
                    </div>
                </div>
            </div>

        </div>

    <footer class="footer">
    </footer>

    </div>
 
    <script src="assets/jquery/jquery-3.6.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>

    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <!--Referencia a AJAX-->
    <script src="code.js"></script>    
    
</body>
</html>