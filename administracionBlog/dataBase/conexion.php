<?php

$coneccion = null;

function coneccionBase()
{
    global $coneccion;
    $coneccion = mysqli_connect('172.19.10.78', 'kimobill', 'sIst2m1s2020');
    mysqli_set_charset($coneccion, 'utf8');
}

function desconectarBase()
{
    global $coneccion;
    mysqli_close($coneccion);
}

function validarLogin($usuario, $contraseña)
{
    global $coneccion;
    $consulta = "SELECT * FROM cooperativasantarosapatutan.usuarios U WHERE U.usuario ='" . $usuario . "' AND U.contraseña = '" . $contraseña . "';";
    $respuesta = mysqli_query($coneccion, $consulta);
    if ($usuario = $respuesta->fetch_assoc()) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['sesion'] = $usuario['id'];
        return true;
    }
    return false;
}

function sesionIniciada()
{
    session_start();
    return isset($_SESSION['sesion']);
}

function insertarNoticia($titulo, $descripcion, $usuarioIngresa, $fechaIngreso, $destacado, $portadaRuta)
{
    global $coneccion;
    $id = siguienteId('cooperativasantarosapatutan.noticias');
    $insert = "INSERT INTO cooperativasantarosapatutan.noticias VALUES ('" . $id . "', '" . $titulo . "', '" . $descripcion . "', '" . $usuarioIngresa . "', NULL, '" . $fechaIngreso . "', '" . $fechaIngreso . "', NULL, '" . $destacado . "', false, 0, '" . $portadaRuta . "');";
    $respuestaQuery = mysqli_query($coneccion, $insert);
    $respuesta = ($respuestaQuery) ? $id : false;
    return $respuesta;
}

function insertarDocumentos($ruta, $nombre, $idNoticia)
{
    global $coneccion;
    $id = siguienteId('cooperativasantarosapatutan.docuemntos');
    $insert = "INSERT into cooperativasantarosapatutan.docuemntos value ('" . $id . "','" . $ruta . "', '" . $nombre . "', '" . $idNoticia . "')";
    $respuestaQuery = mysqli_query($coneccion, $insert);
    $respuesta = ($respuestaQuery) ? $id : false;
    return $respuesta;
}

function getTodosNoticias()
{
    global $coneccion;
    $consulta = "SELECT * FROM cooperativasantarosapatutan.noticias N ORDER BY N.id DESC";
    $respuesta = mysqli_query($coneccion, $consulta);
    return $respuesta->fetch_all();
}

function  deleteNoticia($idNoticia, $idUsuarioElimina, $fechaEliminado)
{
    global $coneccion;
    $consulta = "UPDATE cooperativasantarosapatutan.noticias SET eliminado = true, id_usuarioElimina = '" . $idUsuarioElimina . "', fechaEliminado = '" . $fechaEliminado . "' WHERE id = '" . $idNoticia . "'";
    $respuesta = mysqli_query($coneccion, $consulta);
    return $respuesta;
}

function  publicarNoticia($idNoticia)
{
    global $coneccion;
    $consulta = "UPDATE cooperativasantarosapatutan.noticias SET eliminado = false, id_usuarioElimina = null, fechaEliminado = null WHERE id = '" . $idNoticia . "'";
    $respuesta = mysqli_query($coneccion, $consulta);
    return $respuesta;
}

function siguienteId($tabla)
{
    global $coneccion;
    $ultimoId = "SELECT id FROM $tabla order by id desc limit 1;";
    $id = mysqli_query($coneccion, $ultimoId);
    return $id->fetch_array()[0] + 1;
}

function getNoticia($idNoticia)
{
    global $coneccion;
    $consulta = "SELECT * FROM cooperativasantarosapatutan.noticias N WHERE N.id = '" . $idNoticia . "' ORDER BY N.id DESC";
    $respuesta = mysqli_query($coneccion, $consulta);
    return $respuesta->fetch_assoc();
}

function getGaleriaNoticia($idNoticia)
{
    global $coneccion;
    $consulta = "SELECT * FROM cooperativasantarosapatutan.docuemntos D WHERE D.id_noticia = '" . $idNoticia . "' ORDER BY D.id DESC";
    $respuesta = mysqli_query($coneccion, $consulta);
    return $respuesta->fetch_all();
}

function postNoticia($idNoticia, $titulo, $descripcion, $portadaRuta, $ultimaEdicion, $destacado)
{
    global $coneccion;
    if ($portadaRuta != null) {
        $consulta = "UPDATE cooperativasantarosapatutan.noticias SET titulo = '".$titulo."', descripcion = '".$descripcion."', portadaRuta = '".$portadaRuta."', ultimaEdicion = '".$ultimaEdicion."', destacado = '".$destacado."' WHERE id = '".$idNoticia."'";
    } else {
        $consulta = "UPDATE cooperativasantarosapatutan.noticias SET titulo = '".$titulo."', descripcion = '".$descripcion."', ultimaEdicion = '".$ultimaEdicion."', destacado = '".$destacado."' WHERE id = '".$idNoticia."'";
    }
    $respuestaQuery = mysqli_query($coneccion, $consulta);
    $respuesta = ($respuestaQuery) ? true : false;
    return $respuesta;
}
