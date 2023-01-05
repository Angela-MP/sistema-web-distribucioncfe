<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}/*else{
    if($_SESSION["s_id_rol"]!=1){
       header("Location: home_error.php");
    }   
}*/
?>

<!DOCTYPE html>
<html>
<html>
<head>
    <link rel="shortcut icon" href="#"/>
    <!--Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit-no">
    <title>CFE Distribución Tuxtepec | Supervisión de obras</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styleOT.css">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">    
</head>
<body>
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
                <a class="nav-link" href="bd/logout.php" role="button">Cerrar sesión</a>
            </li>
          </ul>
      </div>
      </div>
        </nav>           
      </div>
    </header>

  <div class="container">
     <div class="row">
       <figure class="text-center">
         <blockquote class="blockquote">
           <br />
           <p>Zona Papaloapan</p>
         </blockquote>
       <figcaption class="blockquote-footer">
         División Oriente
       </figcaption>
       </figure>          
     <div class="col-lg-12">
       <img class="img-fluid mx-auto d-block" src="img/zonas.png">
     </div>
  </div>    
  <br />

<!--PIE DE PAGINA-->  
<footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
  <h5 class="headin5_amrc col_white_amrc pt2">Información</h5>
<!--headin5_amrc-->
  <img src="img/footer-widget-logo.png">
  <p class="mb10">CFE Una empresa de clase mundial</p>
  <p><i class="fa fa-location-arrow"></i> Prol. 20 de Noviembre 2235, Colonia Bella Vista, San Juan Bautista Tuxtepec, Oaxaca. CP 68340</p>
</div>



<div class=" col-sm-4 col-md  col-12 col">
  <h5 class="headin5_amrc col_white_amrc pt2">Atención a clientes</h5>
<!--headin5_amrc ends here-->

  <ul class="footer_ul2_amrc">
    <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>CFE_Contigo <a href="#">https://twitter.com/CFE_Contigo</a></p></li>
<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>


<div class="container">

<ul class="social_footer_ul">
<li><a href="https://www.facebook.com/CFENacional/"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://twitter.com/cfemx"><i class="fab fa-twitter"></i></a></li>
<li><a href="https://www.youtube.com/channel/UC5YjgDMZ08jSn4LxPom7O2Q/videos"><i class="fab fa-youtube"></i></a></li>
<li><a href="https://www.instagram.com/cfe_nacional/"><i class="fab fa-instagram"></i></a></li>
</ul>
<!--social_footer_ul ends here-->
</div>

</footer>  

    
    <!--Datatables JS--> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    

</body>
</html>