<<<<<<< HEAD
<?php

include_once ('..bd/conexion.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepcion de parametros de los datos enviado a traves del metodo POST desde el archivo de JS
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$solicitante = (isset($_POST['solicitante'])) ? $_POST['solicitante'] : '';
$fecha_inicio = (isset($_POST['fecha_inicio'])) ? $_POST['fecha_inicio'] : '';
$fecha_final = (isset($_POST['fecha_final'])) ? $_POST['fecha_final'] : '';
$observacion = (isset($_POST['observacion'])) ? $_POST['observacion'] : '';

$consulta = "INSERT INTO obrasterceros (nombre, solicitante, fecha_inicio, fecha_final, observacion) VALUES ('$nombre', '$solicitante', '$fecha_inicio', '$fecha_final', '$observacion')";
$resultado = $conexion->prepare($consulta);
$resultado->execute();


$consulta = "SELECT id,nombre, solicitante, fecha_inicio, fecha_final, observacion FROM obrasterceros ORDER BY id DESC LIMIT 1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//enviar el arreglo final en formato JSON al archivo JS
$conexion = NULL;
=======
<?php

include_once ('..bd/conexion.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepcion de parametros de los datos enviado a traves del metodo POST desde el archivo de JS
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$solicitante = (isset($_POST['solicitante'])) ? $_POST['solicitante'] : '';
$fecha_inicio = (isset($_POST['fecha_inicio'])) ? $_POST['fecha_inicio'] : '';
$fecha_final = (isset($_POST['fecha_final'])) ? $_POST['fecha_final'] : '';
$observacion = (isset($_POST['observacion'])) ? $_POST['observacion'] : '';

$consulta = "INSERT INTO obrasterceros (nombre, solicitante, fecha_inicio, fecha_final, observacion) VALUES ('$nombre', '$solicitante', '$fecha_inicio', '$fecha_final', '$observacion')";
$resultado = $conexion->prepare($consulta);
$resultado->execute();


$consulta = "SELECT id,nombre, solicitante, fecha_inicio, fecha_final, observacion FROM obrasterceros ORDER BY id DESC LIMIT 1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//enviar el arreglo final en formato JSON al archivo JS
$conexion = NULL;
>>>>>>> d801b96badeab088d643ecce623e617382784e66
