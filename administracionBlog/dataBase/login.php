<?php 

require './conexion.php';

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

coneccionBase();

if (validarLogin($usuario, $contraseña)) {
    header('Location: ../administracion.php');
} else {
    echo '<script language="javascript">alert("Los datos ingresados son incorrectos.");
    window.location.href = "../login.html";
    </script>';
}

desconectarBase();
?>