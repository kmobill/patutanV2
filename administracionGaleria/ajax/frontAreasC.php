<?php

session_start();

require '../models/frontAreasM.php';
$frontAreas = new frontAreas();
date_default_timezone_set("America/Lima");
$date = date('Y-m-d H:i:s');
$userId = $_SESSION['usu_2'];
$rol = $_SESSION['workgroup_2'];

switch ($_GET["action"]) {
    //*************INFO DE LA CARGA CON LOS FILTROS DE GESTION DE CANALES ELECTRÓNICOS*****************//
    case 'tacometroNPSFiltros':
        $txtAreas = isset($_POST["txtAreas"]) ? LimpiarCadena($_POST["txtAreas"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $valor_array = explode(',', $txtAreas); //explode convierte string a array e implode convierte array a string
        $longitud = count($valor_array);
        for ($i = 0; $i < $longitud; $i++) {
            $vAreas = trim($valor_array[$i]);
            if ($vAreas == '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO LIKE '%$vAreas%'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas != '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO = '$vAreas'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas == '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO LIKE '%$vAreas%'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas != '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO = '$vAreas'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            }
        }

        if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAreas == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE SEGMENTO like '%$txtAreas%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAreas != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAreas != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAreas == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        }
        $sql = "SELECT 
                ROUND((SUM(CASE 
                        WHEN RESPUESTA_11 >= 9 AND RESPUESTA_11 <= 10 THEN 1
                        WHEN RESPUESTA_11 >= 7 AND RESPUESTA_11 <= 8 THEN 0
                WHEN RESPUESTA_11 >= 0 AND RESPUESTA_11 <= 6 THEN -1
                END)/count(RESPUESTA_11))*100,2) AS NPS
                FROM BGR.TMP1 g1; ";
        $value = ejecutarConsulta($sql);
        $row = mysqli_fetch_array($value, MYSQLI_BOTH);
        $NPS = $row["NPS"];
        echo $NPS;
        ejecutarConsulta("DROP TABLE BGR.TMP");
        break;

    case 'tacometroINSFiltros':
        $txtAreas = isset($_POST["txtAreas"]) ? LimpiarCadena($_POST["txtAreas"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $valor_array = explode(',', $txtAreas); //explode convierte string a array e implode convierte array a string
        $longitud = count($valor_array);
        for ($i = 0; $i < $longitud; $i++) {
            $vAreas = trim($valor_array[$i]);
            if ($vAreas == '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO LIKE '%$vAreas%'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas != '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO = '$vAreas'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas == '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO LIKE '%$vAreas%'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas != '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO = '$vAreas'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            }
        }

        if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAreas == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAreas != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAreas != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAreas == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        }

        $sql = "SELECT 
                ROUND((SUM(CASE 
                        WHEN RESPUESTA_9 >= 9 AND RESPUESTA_9 <= 10 THEN 1
                        WHEN RESPUESTA_9 >= 7 AND RESPUESTA_9 <= 8 THEN 0
                WHEN RESPUESTA_9 >= 1 AND RESPUESTA_9 <= 6 THEN -1
                END)/count(RESPUESTA_9))*100,2) AS INS
                FROM BGR.TMP1 g1; ";
        $value = ejecutarConsulta($sql);
        $row = mysqli_fetch_array($value, MYSQLI_BOTH);
        $INS = $row["INS"];
        echo $INS;
        ejecutarConsulta("DROP TABLE BGR.TMP");
        break;

    case 'tacometroCESFiltros':
        $txtAreas = isset($_POST["txtAreas"]) ? LimpiarCadena($_POST["txtAreas"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $valor_array = explode(',', $txtAreas); //explode convierte string a array e implode convierte array a string
        $longitud = count($valor_array);
        for ($i = 0; $i < $longitud; $i++) {
            $vAreas = trim($valor_array[$i]);
            if ($vAreas == '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO LIKE '%$vAreas%'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas != '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO = '$vAreas'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas == '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO LIKE '%$vAreas%'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vAreas != '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                        . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                        . "FROM bgr.GESTIONFINALAREAS "
                        . "WHERE SEGMENTO = '$vAreas'"
                        . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                FROM bgr.GESTIONFINALCANALES 
                                WHERE SEGMENTO LIKE '%$vAreas%' 
                                AND CAMPAIGNID LIKE 'BGR_TC' 
                                AND RESULTLEVEL1 LIKE 'CU1%');");
            }
        }

        if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAreas == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtAreas != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAreas != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtAreas == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE 
                            SEGMENTO like '%$txtAreas%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        }

        $sql = "SELECT
                        ROUND((SUM(CASE 
                            WHEN RESPUESTA_10 = 'MUY FACIL' THEN 0
                            WHEN RESPUESTA_10 = 'POCO FACIL' THEN 1
                            WHEN RESPUESTA_10 = 'FACIL' THEN 0
                            WHEN RESPUESTA_10 = 'DIFICIL' THEN 1
                            WHEN RESPUESTA_10 = 'MUY DIFICIL' THEN 1
                        END)/count(RESPUESTA_10))*100,2) AS CES
                    FROM BGR.TMP1 g1; ";
        $value = ejecutarConsulta($sql);
        $row = mysqli_fetch_array($value, MYSQLI_BOTH);
        $CES = $row["CES"];
        echo $CES;
        ejecutarConsulta("DROP TABLE BGR.TMP");
        break;

   
    case 'selectAllLealtadFiltros':
        $txtAreas = isset($_POST["txtAreas"]) ? LimpiarCadena($_POST["txtAreas"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $frontAreas->selectAllLealtadFiltros($txtAreas, $txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        $INS = Array();
        $CES = Array();
        $NPS = Array();
        $LEALTAD = Array();
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            //SEMAFORIZACION INS
            if ($registrar->INS >= 80.00 && $registrar->INS <= 100) {
                $INS = array(
                    "0" => $registrar->INS . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->INS >= 60.00 && $registrar->INS <= 79.99) {
                $INS = array(
                    "0" => $registrar->INS . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->INS <= 59.99) {
                $INS = array(
                    "0" => $registrar->INS . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            }
            //SEMAFORIZACION CES
            if ($registrar->CES >= 0.00 && $registrar->CES <= 14.99) {
                $CES = array(
                    "0" => $registrar->CES . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->CES >= 15.00 && $registrar->CES <= 29.99) {
                $CES = array(
                    "0" => $registrar->CES . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->CES >= 30.00 && $registrar->CES <= 100) {
                $CES = array(
                    "0" => $registrar->CES . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            }
            //SEMAFORIZACION NPS
            if ($registrar->NPS >= 85.00 && $registrar->NPS <= 100) {
                $NPS = array(
                    "0" => $registrar->NPS . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->NPS >= 60.00 && $registrar->NPS <= 84.99) {
                $NPS = array(
                    "0" => $registrar->NPS . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->NPS <= 59.99) {
                $NPS = array(
                    "0" => $registrar->NPS . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            }
            //SEMAFORIZACION LEALTAD
            if ($registrar->LEALTAD >= 80.00 && $registrar->LEALTAD <= 100) {
                $LEALTAD = array(
                    "0" => $registrar->LEALTAD . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->LEALTAD >= 60.00 && $registrar->LEALTAD <= 79.99) {
                $LEALTAD = array(
                    "0" => $registrar->LEALTAD . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->LEALTAD <= 59.99) {
                $LEALTAD = array(
                    "0" => $registrar->LEALTAD . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            }
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->SEGMENTO, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->MUESTRA,
                "2" => ($registrar->NPS == '' || $registrar->NPS == '-') ? '-' : $NPS,
                "3" => ($registrar->INS == '' || $registrar->INS == '-') ? '-' : $INS,
                "4" => ($registrar->CES == '' || $registrar->CES == '-') ? '-' : $CES,
                "5" => ($registrar->LEALTAD == '' || $registrar->LEALTAD == '-') ? '-' : $LEALTAD,
            );
        }
        $resultados = array(
            "sEcho" => 1, /* informacion para la herramienta datatables */
            "iTotalRecords" => count($datos), /* envía el total de columnas a visualizar */
            "iTotalDisplayRecords" => count($datos), /* envia el total de filas a visualizar */
            "aaData" => $datos /* envía el arreglo completo que se llenó con el while */
        );
        echo json_encode($resultados);
        break;
        
}
?>