<?php

session_start();

require '../models/solicitudCreditoHome.php';
$solicitudCredito = new solicitudCreditoHome();
date_default_timezone_set("America/Lima");

/**Array para reemplazar caracteres especiales en los datos recogidos**/
$search = array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ");
$replace = array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&ntilde;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Ntilde;");
/******************************Fin de array****************************/
$txtnombre = $_POST["nombre"];
$nombre = str_replace($search, $replace, $txtnombre); // se utilizaron los array para reemplazar el texto al momento de mostrar en el correo
$telefono = $_POST["telefono"];

$txtemail = $_POST["email"];
$email = str_replace($search, $replace, $txtemail);

$txtsector = $_POST["sector"];
$sector = str_replace($search, $replace, $txtsector);

$txtmessage = $_POST["message"];
$message = str_replace($search, $replace, $txtmessage);

$fecha = date('Y-m-d H:i:s');



switch ($_GET["action"]) {
  case 'envioMail':
    $envioMail = $solicitudCredito->envioCorreos($nombre, $telefono, $email, $sector, $message, $fecha);
    echo ($envioMail);
    break;
  case 'test':
    echo ("nombre: " . $nombre . "telefono: " . $telefono . "fecha: " . $fecha . " email " . $email . " sector " . $sector . "message" . $message);
    break;
  case 'test2':
    $envioMail = $solicitudCredito->envioCorreos($nombre, $telefono, $email, $sector, $message, $fecha, 'ronny_ricard1@hotmail.es', 'ronny.garcia@epn.edu.ec');
    echo ($envioMail);
    break;
}
