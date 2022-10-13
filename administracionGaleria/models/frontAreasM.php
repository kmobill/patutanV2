<?php

require '../config/connection.php';

Class frontAreas {

    public function _construct() { /* Constructor */
    }

    function selectAllLealtadFiltros($txtCanal, $txtFechaInicio, $txtFechaFin) { //mostrar todos los registros
        $valor_array = explode(',', $txtCanal); //explode convierte string a array e implode convierte array a string
        $longitud = count($valor_array);
        for ($i = 0; $i < $longitud; $i++) {
            $vCanal = trim($valor_array[$i]);
            if ($vCanal == '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO LIKE '%$vCanal%'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                    SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                    FROM bgr.GESTIONFINALCANALES 
                                    WHERE SEGMENTO LIKE '%$vCanal%' 
                                    AND CAMPAIGNID LIKE 'BGR_TC' 
                                    AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vCanal != '' && $i == 0) {
                ejecutarConsulta("CREATE TEMPORARY TABLE bgr.tmp AS ("
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO = '$vCanal'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                    SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                    FROM bgr.GESTIONFINALCANALES 
                                    WHERE SEGMENTO LIKE '%$vCanal%' 
                                    AND CAMPAIGNID LIKE 'BGR_TC' 
                                    AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vCanal == '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO LIKE '%$vCanal%'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                    SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                    FROM bgr.GESTIONFINALCANALES 
                                    WHERE SEGMENTO LIKE '%$vCanal%' 
                                    AND CAMPAIGNID LIKE 'BGR_TC' 
                                    AND RESULTLEVEL1 LIKE 'CU1%');");
            } else if ($vCanal != '' && $i > 0) {
                ejecutarConsulta("INSERT INTO BGR.TMP( "
                                . "SELECT SEGMENTO, RESPUESTA_9, RESPUESTA_10,RESPUESTA_11, ResultLevel1, FECHA_ATENCION "
                                . "FROM bgr.GESTIONFINALAREAS "
                                . "WHERE SEGMENTO = '$vCanal'"
                                . "AND RESULTLEVEL1 LIKE 'CU1%');");
                ejecutarConsulta("INSERT INTO bgr.tmp (
                                    SELECT 'TC', RESPUESTA_13, RESPUESTA_14, RESPUESTA_15, ResultLevel1, FECHA_ATENCION
                                    FROM bgr.GESTIONFINALCANALES 
                                    WHERE SEGMENTO LIKE '%$vCanal%' 
                                    AND CAMPAIGNID LIKE 'BGR_TC' 
                                    AND RESULTLEVEL1 LIKE 'CU1%');");
            }
        }

        if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtCanal == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE SEGMENTO like '%$txtCanal%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio == '' || $txtFechaFin == '') && $txtCanal != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE SEGMENTO like '%$txtCanal%' 
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtCanal != '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE SEGMENTO like '%$txtCanal%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        } else if (($txtFechaInicio != '' && $txtFechaFin != '') && $txtCanal == '') {
            ejecutarConsulta("CREATE TEMPORARY TABLE BGR.TMP1 AS (
                            SELECT * FROM bgr.TMP 
                            WHERE SEGMENTO like '%$txtCanal%' 
                            AND STR_TO_DATE(FECHA_ATENCION,'%d/%m/%Y') BETWEEN '$txtFechaInicio' AND '$txtFechaFin'
                            AND RESULTLEVEL1 LIKE 'CU1%');");
        }
        $sql = "SELECT 
                    UPPER(SEGMENTO) AS SEGMENTO,
                    (SELECT 
                    ROUND((SUM(CASE 
                                WHEN RESPUESTA_9 >= 9 AND RESPUESTA_9 <= 10 THEN 1
                                WHEN RESPUESTA_9 >= 7 AND RESPUESTA_9 <= 8 THEN 0
                                WHEN RESPUESTA_9 >= 1 AND RESPUESTA_9 <= 6 THEN -1
                        END)/count(RESPUESTA_9))*100,2) 
                        FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                        AND ResultLevel1 LIKE 'CU1%') AS INS,
                    (SELECT 
                    ROUND((SUM(CASE 
                                WHEN RESPUESTA_10 = 'MUY FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'POCO FACIL' THEN 1
                                WHEN RESPUESTA_10 = 'FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'DIFICIL' THEN 1
                                WHEN RESPUESTA_10 = 'MUY DIFICIL' THEN 1
                    END)/count(RESPUESTA_10))*100,2) 
                    FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                    AND ResultLevel1 LIKE 'CU1%') AS CES,
                    (SELECT
                    ROUND((SUM(CASE 
                                WHEN RESPUESTA_11 >= 9 AND RESPUESTA_11 <= 10 THEN 1
                                WHEN RESPUESTA_11 >= 7 AND RESPUESTA_11 <= 8 THEN 0
                                WHEN RESPUESTA_11 >= 0 AND RESPUESTA_11 <= 6 THEN -1
                    END)/count(RESPUESTA_11))*100,2)
                    FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                    AND ResultLevel1 LIKE 'CU1%') AS NPS,
                    (SELECT
                    COUNT(SEGMENTO)
                    FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                    AND ResultLevel1 LIKE 'CU1%') as MUESTRA,
                    (SELECT
                        ROUND(
                        (((SELECT 
                        ROUND((SUM(CASE 
                                WHEN RESPUESTA_9 >= 9 AND RESPUESTA_9 <= 10 THEN 1
                                WHEN RESPUESTA_9 >= 7 AND RESPUESTA_9 <= 8 THEN 0
                                WHEN RESPUESTA_9 >= 1 AND RESPUESTA_9 <= 6 THEN -1
                        END)/count(RESPUESTA_9))*100,2) 
                        FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                        AND ResultLevel1 LIKE 'CU1%')*40)
                        +
                        ((SELECT 
                        ROUND((1-SUM(CASE 
                                WHEN RESPUESTA_10 = 'MUY FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'POCO FACIL' THEN 1
                                WHEN RESPUESTA_10 = 'FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'DIFICIL' THEN 1
                                WHEN RESPUESTA_10 = 'MUY DIFICIL' THEN 1
                        END)/count(RESPUESTA_10))*100,2)
                        FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                        AND ResultLevel1 LIKE 'CU1%')*30)
                        +
                        ((SELECT
                        ROUND((SUM(CASE 
                                WHEN RESPUESTA_11 >= 9 AND RESPUESTA_11 <= 10 THEN 1
                                WHEN RESPUESTA_11 >= 7 AND RESPUESTA_11 <= 8 THEN 0
                                WHEN RESPUESTA_11 >= 0 AND RESPUESTA_11 <= 6 THEN -1
                        END)/count(RESPUESTA_11))*100,2)
                        FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                        AND ResultLevel1 LIKE 'CU1%')*30)
                        )/100,2)
                    FROM BGR.TMP1 g1 WHERE g1.SEGMENTO = g.SEGMENTO
                    AND ResultLevel1 LIKE 'CU1%' LIMIT 1) AS LEALTAD
                FROM bgr.TMP1 G 
                WHERE ResultLevel1 LIKE 'CU1%'
                group by SEGMENTO
                UNION ALL
                SELECT
                    'TOTAL' AS SEGMENTO,
                    ROUND((SUM(CASE 
                                WHEN RESPUESTA_9 >= 9 AND RESPUESTA_9 <= 10 THEN 1
                                WHEN RESPUESTA_9 >= 7 AND RESPUESTA_9 <= 8 THEN 0
                                WHEN RESPUESTA_9 >= 1 AND RESPUESTA_9 <= 6 THEN -1
                    END)/count(RESPUESTA_9))*100,2)  AS INS,
                    ROUND((SUM(CASE 
                                WHEN RESPUESTA_10 = 'MUY FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'POCO FACIL' THEN 1
                                WHEN RESPUESTA_10 = 'FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'DIFICIL' THEN 1
                                WHEN RESPUESTA_10 = 'MUY DIFICIL' THEN 1
                    END)/count(RESPUESTA_10))*100,2)  AS CES,
                    ROUND((SUM(CASE 
                                WHEN RESPUESTA_11 >= 9 AND RESPUESTA_11 <= 10 THEN 1
                                WHEN RESPUESTA_11 >= 7 AND RESPUESTA_11 <= 8 THEN 0
                                WHEN RESPUESTA_11 >= 0 AND RESPUESTA_11 <= 6 THEN -1
                    END)/count(RESPUESTA_11))*100,2) AS NPS,
                    COUNT(SEGMENTO) AS MUESTRA,
                    ROUND((((SUM(CASE 
                                WHEN RESPUESTA_9 >= 9 AND RESPUESTA_9 <= 10 THEN 1
                                WHEN RESPUESTA_9 >= 7 AND RESPUESTA_9 <= 8 THEN 0
                                WHEN RESPUESTA_9 >= 1 AND RESPUESTA_9 <= 6 THEN -1
                    END)/count(RESPUESTA_9))*0.40)
                    +
                    ((1-SUM(CASE 
                                WHEN RESPUESTA_10 = 'MUY FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'POCO FACIL' THEN 1
                                WHEN RESPUESTA_10 = 'FACIL' THEN 0
                                WHEN RESPUESTA_10 = 'DIFICIL' THEN 1
                                WHEN RESPUESTA_10 = 'MUY DIFICIL' THEN 1
                    END)/count(RESPUESTA_10))*0.30)
                    +
                    ((SUM(CASE 
                                WHEN RESPUESTA_11 >= 9 AND RESPUESTA_11 <= 10 THEN 1
                                WHEN RESPUESTA_11 >= 7 AND RESPUESTA_11 <= 8 THEN 0
                                WHEN RESPUESTA_11 >= 0 AND RESPUESTA_11 <= 6 THEN -1
                    END)/count(RESPUESTA_11))*0.30))*100,2) AS LEALTAD
                FROM bgr.TMP1 G
                WHERE ResultLevel1 LIKE 'CU1%';";
        return ejecutarConsulta($sql);
        ejecutarConsulta("DROP TABLE BGR.TMP, BGR.TMP1");
    }
}

?>