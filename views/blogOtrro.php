<?php
require '../administracionBlog/dataBase/conexion.php';

$mayor = 0;
$max1 = 0;
$max2 = 0;
$destacado = null;
$noticiasBlog = [];
$leido1 = null;
$leido2 = null;

coneccionBase();
$noticias = getTodosNoticias();

foreach ($noticias as $key1) {
    if ($key1[0] > $mayor) {
        if ($key1[8] == 1) {
            $mayor = $key1[0];
            $destacado = $key1;
        }
    }
}

foreach ($noticias as $key3) {
    if ($key3[10] > $max1) {
        $max1 = $key3[10];
        $leido1 = $key3;
    }
}

foreach ($noticias as $key2) {
    if ($key2[10] > $max2 && $key2[10] < $max1) {
        $max2 = $key2[10];
        $leido2 = $key2;
    }
}

foreach ($noticias as $key4) {
    if ($destacado[0] != $key4[0]) {
        array_push($noticiasBlog, $key4);
    }
}
desconectarBase();

function fechaLetras($fecha) {
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));

    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

    return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
}
?>

<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<br>
<br>
<div class="container-fluid" style="font-family: Montserrat;">
    <div class="row">
        <div id="box" class="col-sm-1"></div>
        <div class="col-sm-6">
            <div class="row" style="color:#181E5B;">
                <h1>Destacado</h1>
            </div>
            <div class="row">
                <div onclick="mostrarNoticia(<?= $destacado[0] ?>)" class="col-sm">
                    <img class="img-fluid" style="width: 100%; height: 100%;" src=<?= substr($destacado[11], 1) ?>>
                    <div style="position: absolute; top: 80%; color: #FFFFFF; left: 5%;">
                        <div>
                            <a style="color: #FFFFFF;">
                                <h5><?= $destacado[1] ?></h5>
                            </a>
                        </div>
                        <div><?= fechaLetras($destacado[6]) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row" style="color:#181E5B;">
                <h1>Lo mas leido</h1>
            </div>
            <div class="row" onclick="mostrarNoticia(<?= $leido1[0] ?>)">
                <div class="col-sm-6">
                    <img class="img-fluid" style="width: 100%; height: 100%;" src=<?= substr($leido1[11], 1) ?>>
                </div>
                <div class="col-sm" style="justify-content:center; align-items:center;">
                    <a href="" style="color: #0C273D;">
                        <FONT size=4><b><?= $leido1[1] ?></b> <br> <br> <?= fechaLetras($leido1[6]) ?></font>
                    </a>
                </div>
            </div>
            <br>
            <div class="row" onclick="mostrarNoticia(<?= $leido2[0] ?>)">
                <div class="col-sm-6">
                    <img class="img-fluid" style="width: 100%; height: 100%;" src=<?= substr($leido2[11], 1) ?>>
                </div>
                <div class="col-sm" style="color: #0C273D;">
                    <a href="" style="color: #0C273D;">
                        <FONT size=4><b><?= $leido2[1] ?></b> <br> <br><?= fechaLetras($leido2[6]) ?></font>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <div class="row">
<?php foreach ($noticiasBlog as $fila) : ?>
                    <?php if ($fila[4] != 1) : ?>
                        <div class="col-sm-3" style="padding-right: 30px; padding-top: 25px;">
                            <div class="row" onclick="mostrarNoticia(<?= $fila[0] ?>)">
                                <img class="img-fluid" style="height: 100%; width: 100%;" src=<?= substr($fila[11], 1) ?>>
                                <div class="d-block" style="color: #FFFFFF; position: absolute; align-self: flex-end;">
                                    <div>
                                        <a style="color: #FFFFFF;" href="#"><?= $fila[1] ?></a>
                                    </div>
                                    <div><?= fechaLetras($fila[6]) ?></div>
                                </div>
                            </div>
                        </div>
    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-sm-1"></div>

    </div>
</div>
<br>
<br>
<br>
<?php require 'footer.php'; ?>

<script>
    function mostrarNoticia(idNoticia) {
        $.ajax({
            type: "POST",
            url: '../administracionBlog/dataBase/mostrarNoticia.php',
            data: {
                id: idNoticia,
            },
            success: function (result) {
                location.href = "../noticia.php";
            }
        });
    }
</script>