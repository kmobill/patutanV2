<?php

require '../config/connection.php';
session_start();
date_default_timezone_set("America/Lima");
$_SESSION['usu_2'];
$_SESSION['name_2'];
$_SESSION['state_2'];
$enddate = date('Y-m-d H:i:s');
$_SESSION['workgroup_2'];
$_SESSION['idSession_2'];

$deleteSession = ejecutarConsulta("DELETE FROM session WHERE "
//        . "SessionId = '$_SESSION[idSession]' and "
        . "Usuario = '$_SESSION[usu_2]' ");

// -- eliminamos la sesión del usuario
if (isset($_SESSION['usu_2'])) {
    unset($_SESSION['usu_2']);
    unset($_SESSION['name_2']);
    unset($_SESSION['state_2']);
    unset($_SESSION['workgroup_2']);
    unset($_SESSION['idSession_2']);
}
if(isset($_SESSION['usu_2']) == false){
    session_regenerate_id();
}
session_destroy();
header('location: ../views/login.php');
exit();
?>
