<?php

require "../ajax/Exception.php";
require "../ajax/PHPMailer.php";
require "../ajax/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class solicitudCreditoM {

    public function _construct() { /* Constructor */
    }

    function envioCorreos($nombre, $telefono, $producto, $Tmstmp, $correo, $txtObs, $principalMail, $copiaMail, $CC1) {
        $oMail = new PHPMailer();
        $oMail->isSMTP();
        $oMail->Host = "smtp.hostinger.com";
        $oMail->Port = 465;
        $oMail->SMTPSecure = "ssl";
//        $oMail->SMTPDebug = 2;
        $oMail->SMTPAuth = true;
        $oMail->Username = "info@coacsantarosadepatutan.fin.ec";
        $oMail->Password = "CoacSRPatutan*2021";
        $oMail->setFrom("info@coacsantarosadepatutan.fin.ec", "SOLICITUD DE CREDITO");
        $oMail->addAddress("$principalMail");
        $oMail->addAddress("$copiaMail");
        $oMail->addCC("$CC1");
        $oMail->Subject = "CLIENTE $nombre SOLICITA UN CREDITO";
        $oMail->msgHTML("<!DOCTYPE html>  "
                . "<html>  "
                . "	<style>"
                . "		table td{		"
                . "			font-size: 15px;"
                . "			font-family: Segoe UI;"
                . "		}"
                . "		#caja{"
                . "			width: 550px;"
                . "			height: 530px;"
                . "			border-radius: 30px;"
                . "			padding: 10px;"
                . "			text-align: justify-all;"
                . "			font-family: Segoe UI;"
                . "			font-size: 15px;"
                . "		}"
                . "		#table2{"
                . "			font-family: Segoe UI;"
                . "		}"
                . "	</style>"
                . "	<head> "
                . "		<title>Sentinel</title>"
                . "	</head>"
                . "	<body>"
                . "		<div id ='caja'>"
                . "			<tbody>"
                . "				<br>"
                . "					<b>Estimados </b>"
                . "				</br>"
                . "				<p style='text-align: justify;'>"
                . "					El cliente que detallamos a continuaci&#243;n se ha sido contactado por nuestra p&#225;gina web y desea solicitar un cr&#233;dito"
                . "				</p>"
                . "				<table class='table table-responsive'>"
                . "					<tr>"
                . "						<td width='30%'><b>Nombre del solicitante:</b></td>"
                . "						<td width='100%'>$nombre</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Producto solicitado:</b></td>"
                . "						<td width='100%'>$producto</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Correo del solicitante:</b></td>"
                . "						<td width='100%'>$correo</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Tel&#233;fono del solicitante:</b></td>"
                . "						<td width='100%'>$telefono</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Fecha de contacto:</b></td>"
                . "						<td width='100%'>$Tmstmp</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Observaciones:</b></td>"
                . "						<td width='100%'> $txtObs</td>"
                . "					</tr>"
                . "				</table>"
                . "				<p>"
                . "					<br>"
                . "				</p>"
                . "				<table id ='table2' class='table-responsive'>"
                . "					<tr>"
                . "						<td style='font-size: 14px'><b>Cordialmente,</b></td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td style='font-size: 14px'>Asesor Call Center</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td style='font-size: 14px'>Nota: Este es un mail autom&#225;tico, por favor no responda este mensaje</td>"
                . "					</tr>"
                . "				</table>"
                . "				</tr>"
                . "			</tbody>  "
                . "		</div>"
                . "	</body>  "
                . "</html>");

        if ($oMail->send()) {
            echo("Mail enviado");
        } else {
            echo $oMail->ErrorInfo;
        }
    }

}

?>