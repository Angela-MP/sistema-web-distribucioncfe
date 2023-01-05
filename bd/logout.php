<?php
    session_start();
    unset($_SESSION["s_usuario"]);
    unset($_SESSION["s_id_rol"]);
    unset($_SESSION["s_description"]); 
    session_destroy();
    header("Location:../index.php");
?>