<?php
require './conexion.php';

$idNoticia = $_POST['id'];

coneccionBase();
$noticia = getNoticia($idNoticia);
$imagenes = getGaleriaNoticia($idNoticia);
desconectarBase();

$arr = array('noticia'=>$noticia, 'galeria'=>$imagenes);

session_start();
$_SESSION['noticia'] = json_encode($arr);
