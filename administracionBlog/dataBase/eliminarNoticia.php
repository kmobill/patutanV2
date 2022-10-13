<?php
require './conexion.php';

date_default_timezone_set('America/Cancun');

$fechaEliminado = date('Y-m-d h:i:s A', time());
$idNoticia = $_POST['id'];
$idUsuarioElimina = $_POST['idUsuarioElimina'];

coneccionBase();
deleteNoticia($idNoticia, $idUsuarioElimina, $fechaEliminado);
desconectarBase();