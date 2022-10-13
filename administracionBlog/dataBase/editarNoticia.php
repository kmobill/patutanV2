<?php
require './conexion.php';

$idNoticia = $_POST['id'];
$galeria=array();
$json = new stdClass();

coneccionBase();
$archivo = getNoticia($idNoticia);
foreach (getGaleriaNoticia($idNoticia) as $key) {
    array_push($galeria, $key);
}
desconectarBase();

$json->noticia = $archivo;
$json->galeria = $galeria;

echo json_encode($json);
