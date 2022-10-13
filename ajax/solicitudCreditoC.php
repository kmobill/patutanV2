<?php

session_start();

require '../models/solicitudCreditoM.php';
$solicitudCredito = new solicitudCreditoM();
date_default_timezone_set("America/Lima");

$Tmstmp = date('Y-m-d H:i:s');
/**Array para reemplazar caracteres especiales en los datos recogidos**/
$search = array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ");
$replace = array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&ntilde;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Ntilde;");
/******************************Fin de array****************************/
$txtnombre = $_POST["nombre"];
$nombre = str_replace($search, $replace, $txtnombre); // se utilizaron los array para reemplazar el texto al momento de mostrar en el correo

$telefono = $_POST["telefono"];

$txtcorreo = $_POST["correo"];
$correo = str_replace($search, $replace, $txtcorreo); // se utilizaron los array para reemplazar el texto al momento de mostrar en el correo

$txtproducto = $_POST["txtProducto"];
$producto = str_replace($search, $replace, $txtproducto); // se utilizaron los array para reemplazar el texto al momento de mostrar en el correo

$txtObservaciones =  $_POST["txtObservaciones"];
$txtObs = str_replace($search, $replace, $txtObservaciones); // se utilizaron los array para reemplazar el texto al momento de mostrar en el correo

switch ($_GET["action"]) {
    case 'envioMail':
        /* $principalMail = 'ronny_ricard1@hotmail.es';
        $copiaMail =  'ronny_ricard1@hotmail.es'; */
        $principalMail = 'info@coacsantarosadepatutan.fin.ec';
        $copiaMail = 'info@coacsantarosadepatutan.fin.ec';
        $CC1 = 'info@coacsantarosadepatutan.fin.ec';
        $envioMail = $solicitudCredito->envioCorreos($nombre, $telefono, $producto, $Tmstmp, $correo, $txtObs, $principalMail, $copiaMail, $CC1);
        echo ($envioMail);
        break;
}
