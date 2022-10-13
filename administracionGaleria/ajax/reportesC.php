<?php

session_start();

require '../models/reportesM.php';
$reportes = new reportesM();
date_default_timezone_set("America/Lima");
$date = date('Y-m-d H:i:s');
$userId = $_SESSION['usu_2'];
$region = $_SESSION['Region_2'];
$agencias = $_SESSION['Agencias_2'];
$rol = $_SESSION['workgroup_2'];

switch ($_GET["action"]) {
    //***************************FILTROS PARA INICAR LAS BÚSQUEDAS
    case 'region':
        if ($rol == "1") {
            $result = ejecutarConsulta("SELECT distinct(Region) 'Region' FROM agencias");
            echo '<option value="">TODAS</option>';
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["Region"] . '">' . $row["Region"] . '</option>';
            }
        } else if ($rol == "2") {
            $result = ejecutarConsulta("SELECT distinct(Region) 'Region' FROM agencias where region like '%$region%'");
            if ($region == '') {
                echo '<option value="">Todas</option>';
            }
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["Region"] . '">' . $row["Region"] . '</option>';
            }
        } else if ($rol == "3") {
            $valor_array = explode(',', $agencias); //explode convierte string a array e implode convierte array a string
            $longitud = count($valor_array);
            for ($i = 0; $i < $longitud; $i++) {
                $vAgencia = trim($valor_array[$i]);
                if ($i == 0) {
                    ejecutarConsulta("CREATE TEMPORARY TABLE bgr.temp AS (SELECT REGION FROM bgr.agencias "
                            . "WHERE NOMBRE_AGENCIA = '$vAgencia');");
                } else {
                    ejecutarConsulta("INSERT BGR.TEMP SELECT REGION FROM bgr.agencias
                WHERE NOMBRE_AGENCIA = '$vAgencia'");
                }
            }
            $result = ejecutarConsulta("SELECT DISTINCT Region FROM BGR.TEMP");
            $numRowC = $result->num_rows;
            if ($numRowC == 1) {
                echo '<option value="">Todas</option>';
            }
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["Region"] . '">' . $row["Region"] . '</option>';
            }
            ejecutarConsulta("DROP TABLE BGR.TEMP");
        }
        break;

    case 'agencias':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        if ($rol == "1") {
            $result = ejecutarConsulta("SELECT distinct(NOMBRE_AGENCIA) 'NOMBRE_AGENCIA' FROM agencias where region like '%$txtRegion%' order by NOMBRE_AGENCIA");
            echo '<option value="">Todas</option>';
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["NOMBRE_AGENCIA"] . '">' . $row["NOMBRE_AGENCIA"] . '</option>';
            }
        } else if ($rol == "2") {
            $result = ejecutarConsulta("SELECT distinct(NOMBRE_AGENCIA) 'NOMBRE_AGENCIA' FROM agencias where region like '%$region%' order by NOMBRE_AGENCIA");
            echo '<option value="">Todas</option>';
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["NOMBRE_AGENCIA"] . '">' . $row["NOMBRE_AGENCIA"] . '</option>';
            }
        } else if ($rol == "3") {
            $valor_array = explode(',', $agencias); //explode convierte string a array e implode convierte array a string
            $longitud = count($valor_array);
            echo '<option value="">Todas</option>';
            for ($i = 0; $i < $longitud; $i++) {
                $vAgencia = trim($valor_array[$i]);
                $result = ejecutarConsulta("SELECT distinct(NOMBRE_AGENCIA) 'NOMBRE_AGENCIA' FROM agencias "
                        . "where region like '%$region%' and NOMBRE_AGENCIA = '$vAgencia' order by NOMBRE_AGENCIA");
                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    echo '<option value="' . $row["NOMBRE_AGENCIA"] . '">' . $row["NOMBRE_AGENCIA"] . '</option>';
                }
            }
        }
        break;

    case 'agenciasList':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        if ($rol == "1") {
            $result = ejecutarConsulta("SELECT distinct(NOMBRE_AGENCIA) 'NOMBRE_AGENCIA' FROM agencias where region like '%$txtRegion%' order by NOMBRE_AGENCIA");
            echo '<option value="">Todas</option>';
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["NOMBRE_AGENCIA"] . '">' . $row["NOMBRE_AGENCIA"] . '</option>';
            }
        } else if ($rol == "2") {
            $result = ejecutarConsulta("SELECT distinct(NOMBRE_AGENCIA) 'NOMBRE_AGENCIA' FROM agencias where region like '%$txtRegion%' order by NOMBRE_AGENCIA");
            echo '<option value="">Todas</option>';
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["NOMBRE_AGENCIA"] . '">' . $row["NOMBRE_AGENCIA"] . '</option>';
            }
        } else if ($rol == "3") {
            $valor_array = explode(',', $agencias); //explode convierte string a array e implode convierte array a string
            $longitud = count($valor_array);
            echo '<option value="">Todas</option>';
            for ($i = 0; $i < $longitud; $i++) {
                $vAgencia = trim($valor_array[$i]);
                $result = ejecutarConsulta("SELECT distinct(NOMBRE_AGENCIA) 'NOMBRE_AGENCIA' FROM agencias "
                        . "where region like '%$txtRegion%' and NOMBRE_AGENCIA = '$vAgencia' order by NOMBRE_AGENCIA");
                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    echo '<option value="' . $row["NOMBRE_AGENCIA"] . '">' . $row["NOMBRE_AGENCIA"] . '</option>';
                }
            }
        }
        break;

    case 'selectAll':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        $txtAgencia = isset($_POST["txtAgencia"]) ? LimpiarCadena($_POST["txtAgencia"]) : "";
        $txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena($_POST["txtTipoCliente"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $txtArea = isset($_POST["txtArea"]) ? LimpiarCadena($_POST["txtArea"]) : "";
        $txtSeccion = isset($_POST["txtSeccion"]) ? LimpiarCadena($_POST["txtSeccion"]) : "";

        $respuesta = $reportes->selectAll($agencias, $txtRegion, $txtAgencia, $txtTipoCliente, $txtFechaInicio, $txtFechaFin, $txtArea, $txtSeccion); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->REGION,
                "4" => $registrar->AGENCIA,
                "5" => $registrar->SECCION,
                "6" => $registrar->TIPO_TRANSACCION,
                "7" => $registrar->CAJERO,
                "8" => $registrar->USUARIO_KMB,
                "9" => $registrar->RESPUESTA_1,
                "10" => $registrar->RESPUESTA_1_1,
                "11" => $registrar->RESPUESTA_2,
                "12" => $registrar->RESPUESTA_2_1,
                "13" => $registrar->RESPUESTA_3,
                "14" => $registrar->RESPUESTA_3_1,
                "15" => $registrar->RESPUESTA_4,
                "16" => $registrar->RESPUESTA_4_1,
                "17" => $registrar->RESPUESTA_5,
                "18" => $registrar->RESPUESTA_5_1,
                "19" => $registrar->RESPUESTA_6,
                "20" => $registrar->RESPUESTA_6_1,
                "21" => $registrar->RESPUESTA_7,
                "22" => $registrar->RESPUESTA_7_1,
                "23" => $registrar->RESPUESTA_8,
                "24" => $registrar->RESPUESTA_8_1,
                "25" => $registrar->RESPUESTA_9,
                "26" => $registrar->RESPUESTA_9_1,
                "27" => $registrar->RESPUESTA_10,
                "28" => $registrar->RESPUESTA_10_1,
                "29" => $registrar->RESPUESTA_11,
                "30" => $registrar->RESPUESTA_11_1,
                "31" => $registrar->RESPUESTA_12,
                "32" => $registrar->RESPUESTA_12_1,
                "33" => $registrar->RESPUESTA_13,
                "34" => $registrar->RESPUESTA_13_1,
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

    case 'reportBGRDigital':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportBGRDigital($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_1,
                "8" => $registrar->RESPUESTA_1_1,
                "9" => $registrar->RESPUESTA_2,
                "10" => $registrar->RESPUESTA_2_1,
                "11" => $registrar->RESPUESTA_3,
                "12" => $registrar->RESPUESTA_3_1,
                "13" => $registrar->RESPUESTA_7,
                "14" => $registrar->RESPUESTA_7_1,
                "15" => $registrar->RESPUESTA_12,
                "16" => $registrar->RESPUESTA_12_1,
                "17" => $registrar->RESPUESTA_13,
                "18" => $registrar->RESPUESTA_13_1,
                "19" => $registrar->RESPUESTA_14,
                "20" => $registrar->RESPUESTA_14_1,
                "21" => $registrar->RESPUESTA_15,
                "22" => $registrar->RESPUESTA_15_1,
                "23" => $registrar->RESPUESTA_16,
                "24" => $registrar->RESPUESTA_16_1,
                "25" => $registrar->RESPUESTA_17,
                "26" => $registrar->RESPUESTA_18,
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
        
    case 'reportBGRMovil':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportBGRMovil($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_1,
                "8" => $registrar->RESPUESTA_1_1,
                "9" => $registrar->RESPUESTA_2,
                "10" => $registrar->RESPUESTA_2_1,
                "11" => $registrar->RESPUESTA_3,
                "12" => $registrar->RESPUESTA_3_1,
                "13" => $registrar->RESPUESTA_7,
                "14" => $registrar->RESPUESTA_7_1,
                "15" => $registrar->RESPUESTA_9,
                "16" => $registrar->RESPUESTA_9_1,
                "17" => $registrar->RESPUESTA_11,
                "18" => $registrar->RESPUESTA_11_1,
                "19" => $registrar->RESPUESTA_12,
                "20" => $registrar->RESPUESTA_12_1,
                "21" => $registrar->RESPUESTA_13,
                "22" => $registrar->RESPUESTA_13_1,
                "23" => $registrar->RESPUESTA_14,
                "24" => $registrar->RESPUESTA_14_1,
                "25" => $registrar->RESPUESTA_15,
                "26" => $registrar->RESPUESTA_15_1,
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
        
    case 'reportBGRNet':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportBGRNet($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_1,
                "8" => $registrar->RESPUESTA_1_1,
                "9" => $registrar->RESPUESTA_2,
                "10" => $registrar->RESPUESTA_2_1,
                "11" => $registrar->RESPUESTA_3,
                "12" => $registrar->RESPUESTA_3_1,
                "13" => $registrar->RESPUESTA_7,
                "14" => $registrar->RESPUESTA_7_1,
                "15" => $registrar->RESPUESTA_9,
                "16" => $registrar->RESPUESTA_9_1,
                "17" => $registrar->RESPUESTA_11,
                "18" => $registrar->RESPUESTA_11_1,
                "19" => $registrar->RESPUESTA_12,
                "20" => $registrar->RESPUESTA_12_1,
                "21" => $registrar->RESPUESTA_13,
                "22" => $registrar->RESPUESTA_13_1,
                "23" => $registrar->RESPUESTA_14,
                "24" => $registrar->RESPUESTA_14_1,
                "25" => $registrar->RESPUESTA_15,
                "26" => $registrar->RESPUESTA_15_1,
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
        
    case 'reportCallcenter':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportCallcenter($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_1,
                "8" => $registrar->RESPUESTA_1_1,
                "9" => $registrar->RESPUESTA_2,
                "10" => $registrar->RESPUESTA_2_1,
                "11" => $registrar->RESPUESTA_3,
                "12" => $registrar->RESPUESTA_3_1,
                "13" => $registrar->RESPUESTA_4,
                "14" => $registrar->RESPUESTA_4_1,
                "15" => $registrar->RESPUESTA_5,
                "16" => $registrar->RESPUESTA_5_1,
                "17" => $registrar->RESPUESTA_6,
                "18" => $registrar->RESPUESTA_6_1,
                "19" => $registrar->RESPUESTA_7,
                "20" => $registrar->RESPUESTA_7_1,
                "21" => $registrar->RESPUESTA_8,
                "22" => $registrar->RESPUESTA_8_1,
                "23" => $registrar->RESPUESTA_9,
                "24" => $registrar->RESPUESTA_9_1,
                "25" => $registrar->RESPUESTA_10,
                "26" => $registrar->RESPUESTA_10_1,
                "27" => $registrar->RESPUESTA_13,
                "28" => $registrar->RESPUESTA_13_1,
                "29" => $registrar->RESPUESTA_14,
                "30" => $registrar->RESPUESTA_14_1,
                "31" => $registrar->RESPUESTA_15,
                "32" => $registrar->RESPUESTA_15_1,
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

    case 'reportAtributos':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        $txtAgencia = isset($_POST["txtAgencia"]) ? LimpiarCadena($_POST["txtAgencia"]) : "";
        $txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena($_POST["txtTipoCliente"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $txtArea = isset($_POST["txtArea"]) ? LimpiarCadena($_POST["txtArea"]) : "";
        $txtSeccion = isset($_POST["txtSeccion"]) ? LimpiarCadena($_POST["txtSeccion"]) : "";

        $respuesta = $reportes->reportAtributos($agencias, $txtRegion, $txtAgencia, $txtTipoCliente, $txtFechaInicio, $txtFechaFin, $txtArea, $txtSeccion); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $ASESORIA = Array();
            $CLARIDAD = Array();
            $AMABILIDAD = Array();
            $EMPATIA = Array();
            $EFECTIVIDAD = Array();
            $PERSONALIDAD = Array();
            $AGILIDAD = Array();
            $ACCESIBILIDAD = Array();
            $VISION = Array();
            //SEMAFORIZACION ASESORIA
            if ($registrar->ASESORIA >= 80.00 && $registrar->ASESORIA <= 100) {
                $ASESORIA = array(
                    "0" => $registrar->ASESORIA . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->ASESORIA >= 60.00 && $registrar->ASESORIA <= 79.99) {
                $ASESORIA = array(
                    "0" => $registrar->ASESORIA . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->ASESORIA <= 0.00 && $registrar->ASESORIA <= 59.99) {
                $ASESORIA = array(
                    "0" => $registrar->ASESORIA . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $ASESORIA = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION CLARIDAD
            if ($registrar->CLARIDAD >= 80.00 && $registrar->CLARIDAD <= 100) {
                $CLARIDAD = array(
                    "0" => $registrar->CLARIDAD . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->CLARIDAD >= 60.00 && $registrar->CLARIDAD <= 79.99) {
                $CLARIDAD = array(
                    "0" => $registrar->CLARIDAD . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->CLARIDAD >= 0.01 && $registrar->CLARIDAD <= 59.99) {
                $CLARIDAD = array(
                    "0" => $registrar->CLARIDAD . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $CLARIDAD = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION AMABILIDAD
            if ($registrar->AMABILIDAD >= 80.00 && $registrar->AMABILIDAD <= 100) {
                $AMABILIDAD = array(
                    "0" => $registrar->AMABILIDAD . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->AMABILIDAD >= 60.00 && $registrar->AMABILIDAD <= 79.99) {
                $AMABILIDAD = array(
                    "0" => $registrar->AMABILIDAD . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->AMABILIDAD >= 0.00 && $registrar->AMABILIDAD <= 59.99) {
                $AMABILIDAD = array(
                    "0" => $registrar->AMABILIDAD . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $AMABILIDAD = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION EMPATIA
            if ($registrar->EMPATIA >= 80.00 && $registrar->EMPATIA <= 100) {
                $EMPATIA = array(
                    "0" => $registrar->EMPATIA . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->EMPATIA >= 60.00 && $registrar->EMPATIA <= 79.99) {
                $EMPATIA = array(
                    "0" => $registrar->EMPATIA . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->EMPATIA >= 0.00 && $registrar->EMPATIA <= 59.99) {
                $EMPATIA = array(
                    "0" => $registrar->EMPATIA . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $EMPATIA = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION EFECTIVIDAD
            if ($registrar->EFECTIVIDAD >= 80.00 && $registrar->EFECTIVIDAD <= 100) {
                $EFECTIVIDAD = array(
                    "0" => $registrar->EFECTIVIDAD . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->EFECTIVIDAD >= 60.00 && $registrar->EFECTIVIDAD <= 79.99) {
                $EFECTIVIDAD = array(
                    "0" => $registrar->EFECTIVIDAD . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->EFECTIVIDAD >= 0.00 && $registrar->EFECTIVIDAD <= 59.99) {
                $EFECTIVIDAD = array(
                    "0" => $registrar->EFECTIVIDAD . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $EFECTIVIDAD = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION PERSONALIZACION
            if ($registrar->PERSONALIZACION >= 80.00 && $registrar->PERSONALIZACION <= 100) {
                $PERSONALIZACION = array(
                    "0" => $registrar->PERSONALIZACION . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->PERSONALIZACION >= 60.00 && $registrar->PERSONALIZACION <= 79.99) {
                $PERSONALIZACION = array(
                    "0" => $registrar->PERSONALIZACION . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->PERSONALIZACION >= 0.00 && $registrar->PERSONALIZACION <= 59.99) {
                $PERSONALIZACION = array(
                    "0" => $registrar->PERSONALIZACION . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $PERSONALIZACION = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION AGILIDAD
            if ($registrar->AGILIDAD >= 80.00 && $registrar->AGILIDAD <= 100) {
                $AGILIDAD = array(
                    "0" => $registrar->AGILIDAD . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->AGILIDAD >= 60.00 && $registrar->AGILIDAD <= 79.99) {
                $AGILIDAD = array(
                    "0" => $registrar->AGILIDAD . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->AGILIDAD >= 0.00 && $registrar->AGILIDAD <= 59.99) {
                $AGILIDAD = array(
                    "0" => $registrar->AGILIDAD . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $AGILIDAD = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION ACCESIBILIDAD
            if ($registrar->ACCESIBILIDAD >= 80.00 && $registrar->ACCESIBILIDAD <= 100) {
                $ACCESIBILIDAD = array(
                    "0" => $registrar->ACCESIBILIDAD . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->ACCESIBILIDAD >= 60.00 && $registrar->ACCESIBILIDAD <= 79.99) {
                $ACCESIBILIDAD = array(
                    "0" => $registrar->ACCESIBILIDAD . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->ACCESIBILIDAD >= 0.00 && $registrar->ACCESIBILIDAD <= 59.99) {
                $ACCESIBILIDAD = array(
                    "0" => $registrar->ACCESIBILIDAD . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $ACCESIBILIDAD = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION VISION
            if ($registrar->VISION >= 80.00 && $registrar->VISION <= 100) {
                $VISION = array(
                    "0" => $registrar->VISION . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->VISION >= 60.00 && $registrar->VISION <= 79.99) {
                $VISION = array(
                    "0" => $registrar->VISION . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->VISION >= 0.00 && $registrar->VISION <= 59.99) {
                $VISION = array(
                    "0" => $registrar->VISION . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $VISION = array(
                    "0" => '-',
                );
            }
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->AGENCIA, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => ($registrar->ASESORIA == '' || $registrar->ASESORIA == '-') ? '-' : $ASESORIA,
                "2" => ($registrar->CLARIDAD == '' || $registrar->CLARIDAD == '-') ? '-' : $CLARIDAD,
                "3" => ($registrar->AMABILIDAD == '' || $registrar->AMABILIDAD == '-') ? '-' : $AMABILIDAD,
                "4" => ($registrar->EMPATIA == '' || $registrar->EMPATIA == '-') ? '-' : $EMPATIA,
                "5" => ($registrar->EFECTIVIDAD == '' || $registrar->EFECTIVIDAD == '-') ? '-' : $EFECTIVIDAD,
                "6" => ($registrar->PERSONALIZACION == '' || $registrar->PERSONALIZACION == '-') ? '-' : $PERSONALIZACION,
                "7" => ($registrar->AGILIDAD == '' || $registrar->AGILIDAD == '-') ? '-' : $AGILIDAD,
                "8" => ($registrar->ACCESIBILIDAD == '' || $registrar->ACCESIBILIDAD == '-') ? '-' : $ACCESIBILIDAD,
                "9" => ($registrar->VISION == '' || $registrar->VISION == '-') ? '-' : $VISION,
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

    case 'reportPilares':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        $txtAgencia = isset($_POST["txtAgencia"]) ? LimpiarCadena($_POST["txtAgencia"]) : "";
        $txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena($_POST["txtTipoCliente"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $txtArea = isset($_POST["txtArea"]) ? LimpiarCadena($_POST["txtArea"]) : "";
        $txtSeccion = isset($_POST["txtSeccion"]) ? LimpiarCadena($_POST["txtSeccion"]) : "";

        $respuesta = $reportes->reportPilares($agencias, $txtRegion, $txtAgencia, $txtTipoCliente, $txtFechaInicio, $txtFechaFin, $txtArea, $txtSeccion); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $COMUNICACION = Array();
            $SERVICIO = Array();
            $PERSONALIZACION = Array();
            $PROCESOS = Array();
            $DIGITAL = Array();
            $VISION = Array();
            //SEMAFORIZACION COMUNICACION
            if ($registrar->COMUNICACION >= 80.00 && $registrar->COMUNICACION <= 100) {
                $COMUNICACION = array(
                    "0" => $registrar->COMUNICACION . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->COMUNICACION >= 60.00 && $registrar->COMUNICACION <= 79.99) {
                $COMUNICACION = array(
                    "0" => $registrar->COMUNICACION . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->COMUNICACION <= 0.00 && $registrar->COMUNICACION <= 59.99) {
                $COMUNICACION = array(
                    "0" => $registrar->COMUNICACION . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $COMUNICACION = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION SERVICIO
            if ($registrar->SERVICIO >= 80.00 && $registrar->SERVICIO <= 100) {
                $SERVICIO = array(
                    "0" => $registrar->SERVICIO . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->SERVICIO >= 60.00 && $registrar->SERVICIO <= 79.99) {
                $SERVICIO = array(
                    "0" => $registrar->SERVICIO . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->SERVICIO <= 0.00 && $registrar->SERVICIO <= 59.99) {
                $SERVICIO = array(
                    "0" => $registrar->SERVICIO . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $SERVICIO = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION PERSONALIZACION
            if ($registrar->PERSONALIZACION >= 80.00 && $registrar->PERSONALIZACION <= 100) {
                $PERSONALIZACION = array(
                    "0" => $registrar->PERSONALIZACION . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->PERSONALIZACION >= 60.00 && $registrar->PERSONALIZACION <= 79.99) {
                $PERSONALIZACION = array(
                    "0" => $registrar->PERSONALIZACION . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->PERSONALIZACION <= 0.00 && $registrar->PERSONALIZACION <= 59.99) {
                $PERSONALIZACION = array(
                    "0" => $registrar->PERSONALIZACION . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $PERSONALIZACION = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION PROCESOS
            if ($registrar->PROCESOS >= 80.00 && $registrar->PROCESOS <= 100) {
                $PROCESOS = array(
                    "0" => $registrar->PROCESOS . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->PROCESOS >= 60.00 && $registrar->PROCESOS <= 79.99) {
                $PROCESOS = array(
                    "0" => $registrar->PROCESOS . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->PROCESOS <= 0.00 && $registrar->PROCESOS <= 59.99) {
                $PROCESOS = array(
                    "0" => $registrar->PROCESOS . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $PROCESOS = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION DIGITAL
            if ($registrar->DIGITAL >= 80.00 && $registrar->DIGITAL <= 100) {
                $DIGITAL = array(
                    "0" => $registrar->DIGITAL . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->DIGITAL >= 60.00 && $registrar->DIGITAL <= 79.99) {
                $DIGITAL = array(
                    "0" => $registrar->DIGITAL . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->DIGITAL <= 0.00 && $registrar->DIGITAL <= 59.99) {
                $DIGITAL = array(
                    "0" => $registrar->DIGITAL . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $DIGITAL = array(
                    "0" => '-',
                );
            }
            //SEMAFORIZACION VISION
            if ($registrar->VISION >= 80.00 && $registrar->VISION <= 100) {
                $VISION = array(
                    "0" => $registrar->VISION . '%' . '<img class="img-circle" src="../images/circulo_verde.png" width="14" height="14" alt=""/>',
                );
            } else if ($registrar->VISION >= 60.00 && $registrar->VISION <= 79.99) {
                $VISION = array(
                    "0" => $registrar->VISION . '%' . '<img class="img-circle" src="../images/circulo_amarillo.png" width="18" height="18" alt=""/>',
                );
            } else if ($registrar->VISION <= 0.00 && $registrar->VISION <= 59.99) {
                $VISION = array(
                    "0" => $registrar->VISION . '%' . '<img class="img-circle" src="../images/circulo_rojo.png" width="12" height="12" alt=""/>',
                );
            } else {
                $VISION = array(
                    "0" => '-',
                );
            }
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->AGENCIA, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => ($registrar->COMUNICACION == '' || $registrar->COMUNICACION == '-') ? '-' : $COMUNICACION,
                "2" => ($registrar->SERVICIO == '' || $registrar->SERVICIO == '-') ? '-' : $SERVICIO,
                "3" => ($registrar->PERSONALIZACION == '' || $registrar->PERSONALIZACION == '-') ? '-' : $PERSONALIZACION,
                "4" => ($registrar->PROCESOS == '' || $registrar->PROCESOS == '-') ? '-' : $PROCESOS,
                "5" => ($registrar->DIGITAL == '' || $registrar->DIGITAL == '-') ? '-' : $DIGITAL,
                "6" => ($registrar->VISION == '' || $registrar->VISION == '-') ? '-' : $VISION,
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

    case 'reportLealtad':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        $txtAgencia = isset($_POST["txtAgencia"]) ? LimpiarCadena($_POST["txtAgencia"]) : "";
        $txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena($_POST["txtTipoCliente"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $txtArea = isset($_POST["txtArea"]) ? LimpiarCadena($_POST["txtArea"]) : "";
        $txtSeccion = isset($_POST["txtSeccion"]) ? LimpiarCadena($_POST["txtSeccion"]) : "";

        $respuesta = $reportes->reportLealtad($agencias, $txtRegion, $txtAgencia, $txtTipoCliente, $txtFechaInicio, $txtFechaFin, $txtArea, $txtSeccion); /* llama a la función del modelo */
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
                "0" => $registrar->AGENCIA, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => ($registrar->NPS == '' || $registrar->NPS == '-') ? '-' : $NPS,
                "2" => ($registrar->INS == '' || $registrar->INS == '-') ? '-' : $INS,
                "3" => ($registrar->CES == '' || $registrar->CES == '-') ? '-' : $CES,
                "4" => ($registrar->LEALTAD == '' || $registrar->LEALTAD == '-') ? '-' : $LEALTAD,
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

    case 'reportResultados':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        $txtAgencia = isset($_POST["txtAgencia"]) ? LimpiarCadena($_POST["txtAgencia"]) : "";
        $txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena($_POST["txtTipoCliente"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $txtArea = isset($_POST["txtArea"]) ? LimpiarCadena($_POST["txtArea"]) : "";
        $txtSeccion = isset($_POST["txtSeccion"]) ? LimpiarCadena($_POST["txtSeccion"]) : "";

        $respuesta = $reportes->reportResultados($agencias, $txtRegion, $txtAgencia, $txtTipoCliente, $txtFechaInicio, $txtFechaFin, $txtArea, $txtSeccion); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->AGENCIA, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => ($registrar->COMUNICACION == '' || $registrar->COMUNICACION == '-') ? '-' : $COMUNICACION,
                "2" => ($registrar->SERVICIO == '' || $registrar->SERVICIO == '-') ? '-' : $SERVICIO,
                "3" => ($registrar->PERSONALIZACION == '' || $registrar->PERSONALIZACION == '-') ? '-' : $PERSONALIZACION,
                "4" => ($registrar->PROCESOS == '' || $registrar->PROCESOS == '-') ? '-' : $PROCESOS,
                "5" => ($registrar->DIGITAL == '' || $registrar->DIGITAL == '-') ? '-' : $DIGITAL,
                "6" => ($registrar->VISION == '' || $registrar->VISION == '-') ? '-' : $VISION,
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

    case 'reporteCobranzas':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteCobranzas($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->RESPUESTA_1,
                "6" => $registrar->RESPUESTA_1_1,
                "7" => $registrar->RESPUESTA_5,
                "8" => $registrar->RESPUESTA_5_1,
                "9" => $registrar->RESPUESTA_9,
                "10" => $registrar->RESPUESTA_9_1,
                "11" => $registrar->RESPUESTA_10,
                "12" => $registrar->RESPUESTA_10_1,
                "13" => $registrar->RESPUESTA_11,
                "14" => $registrar->RESPUESTA_11_1,
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

    case 'reporteEmpresarial':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteEmpresarial($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->RESPUESTA_5,
                "6" => $registrar->RESPUESTA_5_1,
                "7" => $registrar->RESPUESTA_7,
                "8" => $registrar->RESPUESTA_7_1,
                "9" => $registrar->RESPUESTA_9,
                "10" => $registrar->RESPUESTA_9_1,
                "11" => $registrar->RESPUESTA_10,
                "12" => $registrar->RESPUESTA_10_1,
                "13" => $registrar->RESPUESTA_11,
                "14" => $registrar->RESPUESTA_11_1,
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

    case 'reporteInversiones':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteInversiones($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->RESPUESTA_5,
                "6" => $registrar->RESPUESTA_5_1,
                "7" => $registrar->RESPUESTA_7,
                "8" => $registrar->RESPUESTA_7_1,
                "9" => $registrar->RESPUESTA_9,
                "10" => $registrar->RESPUESTA_9_1,
                "11" => $registrar->RESPUESTA_10,
                "12" => $registrar->RESPUESTA_10_1,
                "13" => $registrar->RESPUESTA_11,
                "14" => $registrar->RESPUESTA_11_1,
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

    case 'reporteReclamos':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteReclamos($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->RESPUESTA_5,
                "6" => $registrar->RESPUESTA_5_1,
                "7" => $registrar->RESPUESTA_6,
                "8" => $registrar->RESPUESTA_6_1,
                "9" => $registrar->RESPUESTA_7,
                "10" => $registrar->RESPUESTA_7_1,
                "11" => $registrar->RESPUESTA_8,
                "12" => $registrar->RESPUESTA_8_1,
                "13" => $registrar->RESPUESTA_9,
                "14" => $registrar->RESPUESTA_9_1,
                "15" => $registrar->RESPUESTA_10,
                "16" => $registrar->RESPUESTA_10_1,
                "17" => $registrar->RESPUESTA_11,
                "18" => $registrar->RESPUESTA_11_1,
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

    case 'reporteRecuperaciones':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteRecuperaciones($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->RESPUESTA_1,
                "6" => $registrar->RESPUESTA_1_1,
                "7" => $registrar->RESPUESTA_5,
                "8" => $registrar->RESPUESTA_5_1,
                "9" => $registrar->RESPUESTA_9,
                "10" => $registrar->RESPUESTA_9_1,
                "11" => $registrar->RESPUESTA_10,
                "12" => $registrar->RESPUESTA_10_1,
                "13" => $registrar->RESPUESTA_11,
                "14" => $registrar->RESPUESTA_11_1,
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
        
    case 'reporteTCConsumo':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteTCConsumo($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->SEGMENTO,
                "6" => $registrar->RESPUESTA_13,
                "7" => $registrar->RESPUESTA_13_1,
                "8" => $registrar->RESPUESTA_15,
                "9" => $registrar->RESPUESTA_15_1,
                "10" => $registrar->RESPUESTA_4,
                "11" => $registrar->RESPUESTA_4_1,
                "12" => $registrar->RESPUESTA_14,
                "13" => $registrar->RESPUESTA_14_1,
                "14" => $registrar->RESPUESTA_7
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
        
    case 'reporteTCMillas':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteTCMillas($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->SEGMENTO,
                "6" => $registrar->RESPUESTA_13,
                "7" => $registrar->RESPUESTA_13_1,
                "8" => $registrar->RESPUESTA_15,
                "9" => $registrar->RESPUESTA_15_1,
                "10" => $registrar->RESPUESTA_5,
                "11" => $registrar->RESPUESTA_5_1,
                "12" => $registrar->RESPUESTA_6,
                "13" => $registrar->RESPUESTA_6_1,
                "14" => $registrar->RESPUESTA_14,
                "15" => $registrar->RESPUESTA_14_1,
                "16" => $registrar->RESPUESTA_7,
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
        
    case 'reporteTCNuevas':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteTCNuevas($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->USUARIO_KMB,
                "4" => $registrar->USUARIO_BGR,
                "5" => $registrar->SEGMENTO,
                "6" => $registrar->RESPUESTA_13,
                "7" => $registrar->RESPUESTA_13_1,
                "8" => $registrar->RESPUESTA_15,
                "9" => $registrar->RESPUESTA_15_1,
                "10" => $registrar->RESPUESTA_1,
                "11" => $registrar->RESPUESTA_1_1,
                "12" => $registrar->RESPUESTA_2,
                "13" => $registrar->RESPUESTA_2_1,
                "14" => $registrar->RESPUESTA_3,
                "15" => $registrar->RESPUESTA_14,
                "16" => $registrar->RESPUESTA_14_1,
                "17" => $registrar->RESPUESTA_7,
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

    case 'reporteNovedades':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteNovedades($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->IDENTIFICACION,
                "1" => $registrar->USUARIO_KMB,
                "2" => $registrar->AGENCIA,
                "3" => $registrar->SECCION,
                "4" => $registrar->SEGMENTO,
                "5" => $registrar->FECHA_ATENCION,
                "6" => $registrar->TELEFONO_CONTACTO,
                "7" => $registrar->CAMPANIA,
                "8" => $registrar->OBSERVACION
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

    case 'reporteAgrupadoresAtributos':
        $txtRegion = isset($_POST["txtRegion"]) ? LimpiarCadena($_POST["txtRegion"]) : "";
        $txtAgencia = isset($_POST["txtAgencia"]) ? LimpiarCadena($_POST["txtAgencia"]) : "";
        $txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena($_POST["txtTipoCliente"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $txtArea = isset($_POST["txtArea"]) ? LimpiarCadena($_POST["txtArea"]) : "";
        $txtSeccion = isset($_POST["txtSeccion"]) ? LimpiarCadena($_POST["txtSeccion"]) : "";

        $respuesta = $reportes->reporteAgrupadoresAtributos($agencias, $txtRegion, $txtAgencia, $txtTipoCliente, $txtFechaInicio, $txtFechaFin, $txtArea, $txtSeccion); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->AGENCIA,
                "4" => $registrar->SECCION,
                "5" => $registrar->TIPO_TRANSACCION,
                "6" => $registrar->CAJERO,
                "7" => $registrar->USUARIO_KMB,
                "8" => $registrar->RESPUESTA_9,
                "9" => $registrar->RESPUESTA_9_1,
                "10" => $registrar->ATRIBUTO_INS,
                "11" => $registrar->RESPUESTA_10,
                "12" => $registrar->RESPUESTA_10_1,
                "13" => $registrar->ATRIBUTO_CES,
                "14" => $registrar->RESPUESTA_11,
                "15" => $registrar->RESPUESTA_11_1,
                "16" => $registrar->ATRIBUTO_NPS,
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
        
    case 'reporteConsolidadoLealtad':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reporteConsolidadoLealtad($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA_ATENCION,
                "1" => $registrar->MEDICION,
                "2" => $registrar->CANAL,
                "3" => $registrar->IDENTIFICACION,
                "4" => $registrar->NOMBRE_CLIENTE,
                "5" => $registrar->INS,
                "6" => $registrar->CES,
                "7" => $registrar->NPS
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
        
        
    /*****************************REPORTES DE CANALES ELECTRÓNICOS DEL SEGUNDO INSTRUMENTO**********************************/
    case 'reportBGRDigitalApp':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportBGRDigitalApp($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_13,
                "8" => $registrar->RESPUESTA_13_1,
                "9" => $registrar->RESPUESTA_14,
                "10" => $registrar->RESPUESTA_14_1,
                "11" => $registrar->RESPUESTA_15,
                "12" => $registrar->RESPUESTA_15_1,
                "13" => $registrar->RESPUESTA_7,
                "14" => $registrar->RESPUESTA_7_1,
                "15" => $registrar->RESPUESTA_19_1,
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
        
    case 'reportBGRDigitalWeb':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportBGRDigitalWeb($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_13,
                "8" => $registrar->RESPUESTA_13_1,
                "9" => $registrar->RESPUESTA_14,
                "10" => $registrar->RESPUESTA_14_1,
                "11" => $registrar->RESPUESTA_15,
                "12" => $registrar->RESPUESTA_15_1,
                "13" => $registrar->RESPUESTA_7,
                "14" => $registrar->RESPUESTA_7_1,
                "15" => $registrar->RESPUESTA_19_1,
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
        
    case 'reportBGRNetApp':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportBGRNetApp($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_13,
                "8" => $registrar->RESPUESTA_13_1,
                "9" => $registrar->RESPUESTA_14,
                "10" => $registrar->RESPUESTA_14_1,
                "11" => $registrar->RESPUESTA_15,
                "12" => $registrar->RESPUESTA_15_1,
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
        
    case 'reportBGRNetWeb':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportBGRNetWeb($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_13,
                "8" => $registrar->RESPUESTA_13_1,
                "9" => $registrar->RESPUESTA_14,
                "10" => $registrar->RESPUESTA_14_1,
                "11" => $registrar->RESPUESTA_15,
                "12" => $registrar->RESPUESTA_15_1,
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
        
    case 'reportCallCenterV2':
        $txtCanal = isset($_POST["txtCanal"]) ? LimpiarCadena($_POST["txtCanal"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";

        $respuesta = $reportes->reportCallCenterV2($txtFechaInicio, $txtFechaFin); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->FECHA,
                "1" => $registrar->NOMBRE_CLIENTE,
                "2" => $registrar->IDENTIFICACION,
                "3" => $registrar->SEGMENTO,
                "4" => $registrar->TIPO_TRANSACCION,
                "5" => $registrar->CAJERO,
                "6" => $registrar->USUARIO_KMB,
                "7" => $registrar->RESPUESTA_13,
                "8" => $registrar->RESPUESTA_13_1,
                "9" => $registrar->RESPUESTA_14,
                "10" => $registrar->RESPUESTA_14_1,
                "11" => $registrar->RESPUESTA_15,
                "12" => $registrar->RESPUESTA_15_1,
                "13" => $registrar->RESPUESTA_18,
                "14" => $registrar->RESPUESTA_18_1,
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