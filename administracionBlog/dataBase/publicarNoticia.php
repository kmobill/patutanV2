<?php
require './conexion.php';

$idNoticia = $_POST['id'];

coneccionBase();
publicarNoticia($idNoticia);
desconectarBase();