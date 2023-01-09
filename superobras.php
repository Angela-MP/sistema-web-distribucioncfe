<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, titulo,solicitante, fecha_inicio, fecha_final, observacion FROM obrasterceros";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

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
  <head>

    <!--Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit-no">
    <title>CFE Distribución Tuxtepec | Supervisión de obras</title>

    <!--DataTables CSS-->
    <link rel="stylesheet" type="text/css" href="assets/datatables2/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables2/DataTables-1.13.1/css/dataTables.bootstrap5.min.css">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--Hoja de estilos-->
    <link rel="stylesheet" href="styles/styleOT.css">
    <!--SweetAlert CSS-->
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        <li>
          <a class="nav-link" href="pdf/Manual_de_usuario.pdf" role="button" title="Manual de usuario"><i class="bi bi-patch-question"></i></a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="bd/logout.php" role="button" title="Cerrar sesión">|<i class="bi bi-person-dash-fill" style="font-size: 25px; color: #00724E;text-indent: 1em;"></i></a>
        </li>        
      </ul>
    </div>
  </div>
</nav>           
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <br />
              <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>
              <br /><br />
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                        <table id="tablaObras" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <!--<th>ID</th>-->
                                <th>Título</th>
                                <th>Solicitante</th>
                                <th>Inicio</th>
                                <th>Termino</th>
                                <th>Plano</th>
                                <th>Oficio de presupuesto</th>
                                <th>Oficio de aprobación</th>
                                <th>Registro de supervisión</th>
                                <th>Acta de entrega - recepción</th>
                                <th>Observaciones</th>
                                <!--<th>Archivo</th>-->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['titulo'] ?></td>
                                <td><?php echo $dat['solicitante'] ?></td>
                                <td><?php echo $dat['fecha_inicio'] ?></td>
                                <td><?php echo $dat['fecha_final'] ?></td>
                                <td><?php echo $dat['observacion'] ?></td>    
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
        </div>
    </div>    

<!--MODAL CRUD-->
<div class="modal fade" id="ObrasModalCRUD" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button id="btnCerrar" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formObras">    
        <div class="modal-body">
            <div class="modal-body">
                <div class="form-group">
                  <i class="bi bi-pencil-square"><label for="nombre" class="col-form-label">&nbsp;Título de la obra</label></i>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                  <label for="tipo_obra" class="col-form-label">&nbsp;Tipo de obra</label></i>
                


                  <div class="form-group form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Obra cedida por terceros</label>
                  </div>  
                  <div class="form-group form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Obra propia</label>
                  </div>
                </div>
                
                <div class="form-group">
                  <i class="bi bi-file-person"><label for="solicitante" class="col-form-label">&nbsp;Solicitante/Constructor</label></i>
                  <input type="text" class="form-control" id="solicitante">
                </div>         

                <div class="form-group">
                  <i class="bi bi-calendar-event"><label for="fecha_inicio" class="col-form-label">&nbsp;Fecha de inicio</label></i>
                  <input type="date" class="form-control" id="fecha_inicio">
                </div>

                <div class="form-group">
                  <i class="bi bi-calendar-x"><label for="fecha_final" class="col-form-label">&nbsp;Fecha de termino</label></i>
                  <input type="date" class="form-control" id="fecha_final">
                </div>

                <div class="form-group">
                  <label for="observacion" class="col-form-label">&nbsp;Plano</label>
                  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>                
                
                <div class="form-group">
                  <label for="observacion" class="col-form-label">&nbsp;Oficio de presupuesto</label>
                  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>

                <div class="form-group">
                  <label for="observacion" class="col-form-label">&nbsp;Oficio de aprobación</label>
                  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>

                <div class="form-group">
                  <label for="observacion" class="col-form-label">&nbsp;Registro de supervisión</label>
                  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                
                <div class="form-group">
                  <label for="observacion" class="col-form-label">&nbsp;Acta de entrega - recepción</label>
                  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>

                <div class="form-group">
                  <i class="bi bi-chat-dots-fill"><label for="observacion" class="col-form-label">&nbsp;Observaciones</label></i>
                  <input type="text" class="form-control" id="observacion">
                </div> 

            </div>
            <div class="modal-footer">
              <button id="btnCancelar" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button id="btnGuardar" type="submit"  class="btn btn-success">Guardar</button>
            </div>
        </form>  
      </div>
    </div>
  </div>
</div>
     
    <!--JQuery, Bootstrap, Popper, Sweetalert-->
    <script src="assets/jquery/jquery-3.6.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    
    <!--Datatables JS-->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    
    <script src="code.js"></script>    

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


<div class="col-sm-4 col-md  col-12 col">
  <h5 class="headin5_amrc col_white_amrc pt2">Atención a clientes</h5>
<!--headin5_amrc ends here-->

  <ul class="footer_ul2_amrc">
    <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>CFE_Contigo <a href="#">https://twitter.com/CFE_Contigo</a></p></li>
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

    <!--JQuery, Bootstrap, Popper, Sweetalert-->
    <script src="assets/jquery/jquery-3.6.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    
    <!--Datatables JS-->
    <script type="text/javascript" src="assets/datatables2/datatables.min.js"></script>
     
    <script src="main.js"></script><!--Script de dataTables-->  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    

</body>
</html>
