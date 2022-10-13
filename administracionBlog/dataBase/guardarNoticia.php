<?php
require './conexion.php';
date_default_timezone_set('America/Cancun');

$tituloNoticia = $_POST['tituloNoticia'];
$descripNoticia = $_POST['descripNoticia'];
$idNoticia = $_POST['idNoticia'];
$destacado = ($_POST['destacado']) ? true : false;
$imagenesGaleria = $_FILES['galeria'];
$imagenPortada = $_FILES['portada'];
$fechaActual = date('Y-m-d h:i:s A', time());
//$idNoticia = 0;
$idDocumento = 0;
$mensajeConsulta = true;

coneccionBase();

if ($idNoticia) {
    if ($imagenPortada['name'] != null) {
        move_uploaded_file($imagenPortada["tmp_name"], '../../documentos/blog/portadas/' . $imagenPortada["name"]);
        postNoticia($idNoticia, $tituloNoticia, $descripNoticia, '../documentos/blog/portadas/' . $imagenPortada["name"], $fechaActual, $destacado);
    } else {
        postNoticia($idNoticia, $tituloNoticia, $descripNoticia, null, $fechaActual, $destacado);
    }
    $cantidad = count($imagenesGaleria['tmp_name']);
    for ($i = 0; $i < $cantidad; $i++) {
        if ($imagenesGaleria["name"][$i] != null) {
            move_uploaded_file($imagenesGaleria["tmp_name"][$i], '../../documentos/blog/galeria/' . $imagenesGaleria["name"][$i]);
            insertarDocumentos('../documentos/blog/galeria/' . $imagenesGaleria["name"][$i], $imagenesGaleria["name"][$i], $idNoticia);
        } else {
            header('Location: ../administracion.php?mensajeError=' . $mensajeConsulta);
        }
    }
} else {
    if ($imagenPortada['name'] != null) {
        move_uploaded_file($imagenPortada["tmp_name"], '../../documentos/blog/portadas/' . $imagenPortada["name"]);
        session_start();
        $idNoticia = insertarNoticia($tituloNoticia, $descripNoticia, $_SESSION['sesion'], $fechaActual, $destacado, '../documentos/blog/portadas/' . $imagenPortada["name"]);
        $cantidad = count($imagenesGaleria['tmp_name']);
        for ($i = 0; $i < $cantidad; $i++) {
            if ($imagenesGaleria["name"][$i] != null) {
                move_uploaded_file($imagenesGaleria["tmp_name"][$i], '../../documentos/blog/galeria/' . $imagenesGaleria["name"][$i]);
                insertarDocumentos('../documentos/blog/galeria/' . $imagenesGaleria["name"][$i], $imagenesGaleria["name"][$i], $idNoticia);
            } else {
                header('Location: ../administracion.php?mensajeError=' . $mensajeConsulta);
            }
        }
    } else {
        header('Location: ../administracion.php?mensajeError=' . $mensajeConsulta);
    }
}
desconectarBase();

header('Location: ../administracion.php?mensajeSuccess=' . $mensajeConsulta);
