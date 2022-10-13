<?php
require './dataBase/conexion.php';

if (!sesionIniciada()) {
    header('Location: ./login.html');
}

coneccionBase();
$noticias = getTodosNoticias();
desconectarBase();

$mensajeError = null;
$mensajeSuccess = null;

if (isset($_GET["mensajeError"])) {
    $mensajeError = $_GET["mensajeError"];
}
if (isset($_GET["mensajeSuccess"])) {
    $mensajeSuccess = $_GET["mensajeSuccess"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title>Patutan Administracion</title>
    <?php require './bootstrap.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid" style="background: #192D82; font-family: Montserrat; box-shadow:1px 2px 5px 1px rgba(0, 0, 0, 0.2);">
        <nav class="navbar navbar-expand-lg navbar-light">
            <img style="height: 40px;" class="img-fluid" src="../images/Nuevos recursos/Logo_horizontal_largo_blanco.png">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto"></ul>
                <span class="navbar-text" style="color: white;">
                    <button onclick="location.href='./dataBase/logout.php'">Cerrar Sesion</button>
                </span>
            </div>
        </nav>
    </div>
    <br><br>
    <div class="container-fluid" style="font-family: Montserrat;">
        <div class="row" style="padding-left: 10px; padding-right: 10px;">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <?php if ($mensajeError) { ?>
                    <script>
                        alert('Hubo un error, la noticia no se pudo guardar, verifique que todos los campos hayan sido llenados correctamente');
                        window.location = "./administracion.php";
                    </script>
                <?php } ?>
                <?php if ($mensajeSuccess) { ?>
                    <script>
                        alert('La noticia se guardo correctamente');
                        window.location = "administracion.php";
                    </script>
                <?php } ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Nueva Noticia
                </button>
                <div class="row">Filtrar</div>
                <div class="row">fecha:</div>
                <br><br>
                <div class="row">publicados</div>
                <div class="row">eliminados</div>
                <div class="row">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
            <div class="col-sm">
                <?php foreach ($noticias as $fila) : ?>
                    <div class="row" style="padding-left: 20px;">
                        <div class="card" style="box-shadow:1px 1px 5px 1px rgba(0, 0, 0, 0.2);">
                            <div class="row" style="align-items: center; padding-left: 10px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px;">
                                <div class="col-md-3">
                                    <img style="max-height: 200px;" src=<?= $fila[11] ?> class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $fila[1] ?></h5>
                                        <p class="card-text" style="max-height: 146px; overflow:hidden;"><?= $fila[2] ?></p>
                                        <p class="card-text"><small class="text-muted">Fecha: <?= $fila[5] ?></small></p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="row" style="justify-content: center;">
                                        <button onclick="editarNoticia(<?= $fila[0] ?>)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Editar</button>
                                    </div>
                                    <br>
                                    <?php if ($fila[9] == 0) { ?>
                                        <div class="row" style="justify-content: center;">
                                            <button onclick="eliminarNoticia(<?= $fila[0] ?>, <?= $_SESSION['sesion'] ?>)" type="button" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="row" style="justify-content: center;">
                                            <button onclick="publicarNoticia(<?= $fila[0] ?>)" type="button" class="btn btn-primary">Publicar</button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php endforeach ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" tabindex="-1" data-backdrop='static' role="dialog" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div id="modalNoticia" class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="./dataBase/guardarNoticia.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <input id="tituloNoticia" name="tituloNoticia" type="text" class="form-control" placeholder="Titulo de la noticia" required>
                                </div>
                                <div class="row">
                                    <input id="idNoticia" name="idNoticia" type="hidden">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div style="font-size: 10px;">
                                    Fecha publicacion:
                                </div>
                                <div style="font-size: 10px;" id="publicado"></div>
                            </div>
                            <div class="col-sm">
                                <div style="font-size: 10px;">
                                    Ultima Edicion:
                                </div>
                                <div style="font-size: 10px;" id="editado"></div>
                            </div>
                            <div class="col-sm-1">
                                <button onclick="location.reload()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <textarea id="descripNoticia" name="descripNoticia" class="form-control" placeholder="Noticia" rows="8" style="resize: none;" required></textarea>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Imagen para portada</label>
                                    <input name="portada" type="file" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-sm">
                                <label for="exampleFormControlFile1">Imagenes para la galeria</label>
                                <input type="file" name="galeria[]" class="form-control-file" multiple>
                            </div>
                        </div>
                        <div class="form-check">
                            <input id="destacado" name="destacado" type="checkbox" class="form-check-input">
                            <label class="form-check-label" for="exampleCheck1">Noticia Destacada</label>
                        </div>
                        <div id="galeria" class="modal-body">
                            <div id="fila" class="row">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload()">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $('#galeria').hide();

    function editarNoticia(idNoticia) {
        //$('#modalNoticia').removeClass('modal-dialog-centered modal-lg').addClass('modal-fullscreen');
        $.ajax({
            type: "POST",
            url: './dataBase/editarNoticia.php',
            data: {
                id: idNoticia,
            },
            success: function(response) {
                var info = JSON.parse(response)
                $('#tituloNoticia').val(info.noticia.titulo);
                $('#descripNoticia').val(info.noticia.descripcion);
                $('#publicado').text(info.noticia.fechaIngreso);
                $('#editado').text(info.noticia.ultimaEdicion);
                $('#idNoticia').val(info.noticia.id);
                if (info.noticia.destacado == 1) {
                    $('#destacado').prop('checked', true);
                }
                $('#galeria').show();
                info.galeria.forEach(element => {
                    $('#fila').append('<div style="padding-top: 30px;" class="col-sm-3"> <img class="img-fluid" style="height: 100%; width: 100%; top: 50px;" src=' + element[1] + '> </div>');
                });
            }
        });
    }

    function eliminarNoticia(idNoticia, idUsuarioElimina) {
        $.ajax({
            type: "POST",
            url: './dataBase/eliminarNoticia.php',
            data: {
                id: idNoticia,
                idUsuarioElimina: idUsuarioElimina
            },
            success: function(result) {
                alert('Se elimino correctamente la noticia');
                location.reload();
            }
        });
    }

    function publicarNoticia(idNoticia) {
        $.ajax({
            type: "POST",
            url: './dataBase/publicarNoticia.php',
            data: {
                id: idNoticia,
            },
            success: function(result) {
                alert('La noticia se ha vuelto a publicar correctamente');
                location.reload();
            }
        });
    }
</script>