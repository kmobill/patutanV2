<?php

require '../config/connection.php';
require "../ajax/Exception.php";
require "../ajax/PHPMailer.php";
require "../ajax/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class monitoreoM {

    public function _construct() { /* Constructor */
    }

    function selectAll($agencias, $txtRegion, $txtAgencia, $txtFechaInicio, $txtFechaFin, $txtArea, $txtSeccion) { //mostrar todos los registros
        $valor_array = explode(',', $agencias); //explode convierte string a array e implode convierte array a string
        $longitud = count($valor_array);
        for ($i = 0; $i < $longitud; $i++) {
            $vAgencia = trim($valor_array[$i]);
            if ($vAgencia == '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                        . "SELECT * FROM monitoreo.calificaciones "
                        . "WHERE AGENCIA LIKE '%$vAgencia%' );");
            } else if ($vAgencia != '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                        . "SELECT * FROM monitoreo.calificaciones "
                        . "WHERE AGENCIA = '$vAgencia' );");
            } else if ($vAgencia == '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                        . "SELECT * FROM monitoreo.calificaciones "
                        . "WHERE AGENCIA LIKE '%$vAgencia%' );");
            } else if ($vAgencia != '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                        . "SELECT * FROM monitoreo.calificaciones "
                        . "WHERE AGENCIA = '$vAgencia' );");
            }
        }

        if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAgencia == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            REGION like '%$txtRegion%'  
                            AND AGENCIA LIKE '$txtAgencia%' 
                            AND AREA LIKE '%$txtArea%' 
                            AND SECCION LIKE '%$txtSeccion%' 
                            );");
        } else if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAgencia != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            REGION like '%$txtRegion%'  
                            AND AGENCIA = '$txtAgencia'
                            AND AREA LIKE '%$txtArea%' 
                            AND SECCION LIKE '%$txtSeccion%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAgencia != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            REGION like '%$txtRegion%' 
                            AND AGENCIA = '$txtAgencia'
                            AND AREA LIKE '%$txtArea%' 
                            AND SECCION LIKE '%$txtSeccion%' 
                            AND STR_TO_DATE(FECHAATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAgencia == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            REGION like '%$txtRegion%' 
                            AND AGENCIA LIKE '$txtAgencia%'
                            AND AREA LIKE '%$txtArea%' 
                            AND SECCION LIKE '%$txtSeccion%' 
                            AND STR_TO_DATE(FECHAATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin');");
        }
        $sql = "SELECT Id,
                IDENTIFICACION,
                STR_TO_DATE(FechaAtencion,'%d/%m/%Y') as FECHA,
                REGION,
                AGENCIA,
                SECCION,
                CASE 
                    WHEN TRANSACCION LIKE '%Cr?dito%' THEN replace(TRANSACCION,'?','é')
                    WHEN TRANSACCION LIKE '%ci?n%' THEN replace(TRANSACCION,'?','ó')
                    WHEN TRANSACCION LIKE '%si?n%' THEN replace(TRANSACCION,'?','ó')
                    WHEN TRANSACCION LIKE '%D?bito%' THEN replace(TRANSACCION,'?','é')
                ELSE TRANSACCION END AS TRANSACCION,
                UPPER(AGENT) AS USUARIO_KMB,
                UPPER(EVALUADOR) AS EVALUADOR,
                EstadoMonitoreo,
                Criterio,
                TMA
            FROM bgr.TMP1
            WHERE ESTADOMONITOREO <> 'PENDIENTE' AND ESTADOMONITOREO <>''
            ORDER BY FECHACALIFICACION;";
        return ejecutarConsulta($sql);
        ejecutarConsulta("DROP TABLE BGR.TMP, BGR.TMP1");
    }
    
    function selectAll_1() { //mostrar todos los registros
        $sql = "SELECT Id,
                IDENTIFICACION,
                DATE_FORMAT(FechaAtencion,'%d/%m/%Y') as FECHA,
                REGION,
                AGENCIA,
                SECCION,
                CASE 
                    WHEN TRANSACCION LIKE '%Cr?dito%' THEN replace(TRANSACCION,'?','é')
                    WHEN TRANSACCION LIKE '%ci?n%' THEN replace(TRANSACCION,'?','ó')
                    WHEN TRANSACCION LIKE '%si?n%' THEN replace(TRANSACCION,'?','ó')
                    WHEN TRANSACCION LIKE '%D?bito%' THEN replace(TRANSACCION,'?','é')
                ELSE TRANSACCION END AS TRANSACCION,
                UPPER(AGENT) AS USUARIO_KMB,
                UPPER(EVALUADOR) AS EVALUADOR,
                EstadoMonitoreo,
                Criterio,
                TMA
            FROM bgr.TMP1
            WHERE ESTADOMONITOREO = 'PENDIENTE'
            ORDER BY ESTADOMONITOREO;";
        return ejecutarConsulta($sql);
        ejecutarConsulta("DROP TABLE BGR.TMP, BGR.TMP1");
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM monitoreo.calificaciones where id = '$Id'";
        return ejecutarConsultaSimple($sql);
    }
    
    function envioCorreos($IdCliente, $userId, $txtIdentificacion, $txtAgencia, $txtCampania, $txtSeccion, $txtTramite, $txtFechaAtencion, $txtObs, $txtEstadoMonitoreo, $principalMail, $copiaMail, $CC1, $CC2, $CC3, $CC4) {
        $oMail = new PHPMailer();
        $oMail->isSMTP();
        $oMail->Host = "mail.kimobill.com";
//        $oMail->Host = "a2plcpnl0258.prod.iad2.secureserver.net";
        $oMail->Port = 465;
        $oMail->SMTPSecure = "ssl";
        //$oMail->SMTPDebug = 2;
        $oMail->SMTPAuth = true;
        $oMail->Username = "fvt@kimobill.com";
        $oMail->Password = "fvt.2k2020"; //"fvt.2k2020";
        $oMail->setFrom("fvt@kimobill.com", "");
        $oMail->addAddress("$principalMail");
        $oMail->addAddress("$copiaMail");
        $oMail->addAddress("$CC3");
        $oMail->addCC("$CC1");
        $oMail->addCC("$CC2");
        $oMail->addCC("$CC4");
        $oMail->Subject = "CLIENTE CON CI $txtIdentificacion FUE MODIFICADO AL SIGUIENTE ESTADO DE MONITOREO: $txtEstadoMonitoreo";
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
                . "					<b>Estimado Equipo de calidad, </b>"
                . "				</br>"
                . "				<p style='text-align: justify;'>"
                . "					Se reporta que se encuentra actualizado el siguiente registro:"
                . "				</p>"
                . "				<table class='table table-responsive'>"
                . "					<tr>"
                . "						<td width='30%'><b>C&#233;dula:</b></td>"
                . "						<td width='100%'>$txtIdentificacion</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Campania:</b></td>"
                . "						<td width='100%'>$txtCampania</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Agencia:</b></td>"
                . "						<td width='100%'><b>$txtAgencia</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Secci&#243;n:</b></td>"
                . "						<td width='100%'>$txtSeccion</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Transacci&#243;n:</b></td>"
                . "						<td width='100%'>$txtTramite</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Fecha de atenci&#243;n:</b></td>"
                . "						<td width='100%'>$txtFechaAtencion</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Usuario que modifica:</b></td>"
                . "						<td width='100%'>$userId</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Observaciones:</b></td>"
                . "						<td width='100%'> $txtObs</td>"
                . "					</tr>"
                . "				</table>"
                . "				<p>"
                . "					<br></br>"
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
//            echo("Mail enviado");
//            $sql = "INSERT INTO enviomail(ContactId, InteractionId, Agent, Tmstmp, Nombres, Cedula, Producto, Monto, Garante, Telefonos, Celular, Observaciones, Region, Ciudad, TipoOficina, Agencia, NUP, Correo, EnviadoD1, EnviadoD2, EnviadoCC1, EnviadoCC2, EnviadoCC3, EnviadoCC4, EstadoEnvio) "
//                    . "VALUES ('$IdCliente','','$Agent','$Tmstmp','$contactname','$cedulaMail','$productoMail','$montoMail','$garanteMail','$telefonoMail','$celularMail','$Observaciones','$regionC','$ciudadC','$tipoC','$agenciaC','$nup','$correoCliente','$principalMail','$copiaMail','$CC1','$CC2','$CC3','$CC4','ENVIADO')";
//            return ejecutarConsulta11($sql);
        } else {
            echo $oMail->ErrorInfo;
//            $sql = "INSERT INTO enviomail(ContactId, InteractionId, Agent, Tmstmp, Nombres, Cedula, Producto, Monto, Garante, Telefonos, Celular, Observaciones, Region, Ciudad, TipoOficina, Agencia, NUP, Correo, EnviadoD1, EnviadoD2, EnviadoCC1, EnviadoCC2, EnviadoCC3, EnviadoCC4, EstadoEnvio) "
//                    . "VALUES ('$IdCliente','','$Agent','$Tmstmp','$contactname','$cedulaMail','$productoMail','$montoMail','$garanteMail','$telefonoMail','$celularMail','$Observaciones','$regionC','$ciudadC','$tipoC','$agenciaC','$nup','$correoCliente','$principalMail','$copiaMail','$CC1','$CC2','$CC3','$CC4','NO ENVIADO')";
//            return ejecutarConsulta11($sql);
        }
    }
}

?>