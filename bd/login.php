<<<<<<< HEAD
<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//RECEPCION DE DATOS METODO POST DESDE AJAX
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

//MD5 ENCRIPTACION
$pass = md5($password);
$consulta = "SELECT usuarios.id_rol, roles.description AS rol FROM usuarios JOIN roles ON usuarios.id_rol = roles.id WHERE usuario='$usuario' AND password='$pass' ";
//$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
    $_SESSION["s_id_rol"] = $data[0]["id_rol"];
    $_SESSION["s_description"] = $data[0]["rol"];
}else{
    $_SESSION["s_usuario"] = null;
    $data = null;
}
    print json_encode($data);
$conexion = null;
=======
<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//RECEPCION DE DATOS METODO POST DESDE AJAX
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

//MD5 ENCRIPTACION
$pass = md5($password);
$consulta = "SELECT usuarios.id_rol, roles.description AS rol FROM usuarios JOIN roles ON usuarios.id_rol = roles.id WHERE usuario='$usuario' AND password='$pass' ";
//$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
    $_SESSION["s_id_rol"] = $data[0]["id_rol"];
    $_SESSION["s_description"] = $data[0]["rol"];
}else{
    $_SESSION["s_usuario"] = null;
    $data = null;
}
    print json_encode($data);
$conexion = null;
>>>>>>> d801b96badeab088d643ecce623e617382784e66
?>