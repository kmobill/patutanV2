<?php
require './conexion.php';

$tituloNoticia = $_POST['tituloNoticia'];
$descripNoticia = $_POST['descripNoticia'];


if (isset($_FILES['imagen'])) {
    $cantidad = count($_FILES["imagen"]["tmp_name"]);
    coneccionBase();
    for ($i = 0; $i < $cantidad; $i++) {
        move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], '../../documentos/blog/' . $_FILES["imagen"]["name"][$i]);
    }
    desconectarBase();
}
