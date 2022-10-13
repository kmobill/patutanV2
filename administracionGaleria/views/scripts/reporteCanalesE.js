var tabla;

function init() { /* función inicial */
    $('#listadoRegistros').hide();
    $('#listadoRegistros1').hide();
    $('#listadoRegistros2').hide();
    $('#listadoRegistros3').hide();
}

$("#btnBuscar").click(function () {
    if ($("#txtFechaInicio").val() == "" && $("#txtFechaFin").val() == "") {
        bootbox.alert("Seleccione rango de fechas");
    } else {
        if ($("#txtFechaInicio").val() == "") {
            var txtFechaInicio = '';
        } else {
            var txtFechaInicio = obtenerFecha2($("#txtFechaInicio").val());
        }
        if ($("#txtFechaFin").val() == "") {
            var txtFechaFin = '';
        } else {
            var txtFechaFin = obtenerFecha2($("#txtFechaFin").val());
        }

        $('#listadoRegistros').show();

        tabla = $('#tblListado').dataTable({
            "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
            "aProcessing": true, /* activa el procesamiento de DataTables */
            "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
            dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax": {
                url: '../ajax/reportesC.php?action=reportBGRDigital',
                data: {
                    txtFechaInicio: txtFechaInicio,
                    txtFechaFin: txtFechaFin
                },
                type: "post",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "language": {
                "lengthMenu": "Mostrar : _MENU_ registros",
                "buttons": {
                    "copyTitle": "Tabla Copiada",
                    "copySuccess": {
                        _: '%d líneas copiadas',
                        1: '1 línea copiada'
                    }
                }
            },
            "bDestroy": true,
            "iDisplayLength": 10, /* paginación */
            "order": [[0, "asc"]]
        }).DataTable();
    }
});

$("#btnBuscar1").click(function () {
    if ($("#txtFechaInicio1").val() == "" && $("#txtFechaFin1").val() == "") {
        bootbox.alert("Seleccione rango de fechas");
    } else {
        if ($("#txtFechaInicio1").val() == "") {
            var txtFechaInicio = '';
        } else {
            var txtFechaInicio = obtenerFecha2($("#txtFechaInicio1").val());
        }
        if ($("#txtFechaFin1").val() == "") {
            var txtFechaFin = '';
        } else {
            var txtFechaFin = obtenerFecha2($("#txtFechaFin1").val());
        }

        $('#listadoRegistros1').show();

        tabla = $('#tblListado1').dataTable({
            "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
            "aProcessing": true, /* activa el procesamiento de DataTables */
            "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
            dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax": {
                url: '../ajax/reportesC.php?action=reportBGRMovil',
                data: {
                    txtFechaInicio: txtFechaInicio,
                    txtFechaFin: txtFechaFin
                },
                type: "post",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "language": {
                "lengthMenu": "Mostrar : _MENU_ registros",
                "buttons": {
                    "copyTitle": "Tabla Copiada",
                    "copySuccess": {
                        _: '%d líneas copiadas',
                        1: '1 línea copiada'
                    }
                }
            },
            "bDestroy": true,
            "iDisplayLength": 10, /* paginación */
            "order": [[0, "asc"]]
        }).DataTable();
    }
});

$("#btnBuscar2").click(function () {
    if ($("#txtFechaInicio2").val() == "" && $("#txtFechaFin2").val() == "") {
        bootbox.alert("Seleccione rango de fechas");
    } else {
        if ($("#txtFechaInicio2").val() == "") {
            var txtFechaInicio = '';
        } else {
            var txtFechaInicio = obtenerFecha2($("#txtFechaInicio2").val());
        }
        if ($("#txtFechaFin2").val() == "") {
            var txtFechaFin = '';
        } else {
            var txtFechaFin = obtenerFecha2($("#txtFechaFin2").val());
        }

        $('#listadoRegistros2').show();

        tabla = $('#tblListado2').dataTable({
            "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
            "aProcessing": true, /* activa el procesamiento de DataTables */
            "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
            dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax": {
                url: '../ajax/reportesC.php?action=reportBGRNet',
                data: {
                    txtFechaInicio: txtFechaInicio,
                    txtFechaFin: txtFechaFin
                },
                type: "post",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "language": {
                "lengthMenu": "Mostrar : _MENU_ registros",
                "buttons": {
                    "copyTitle": "Tabla Copiada",
                    "copySuccess": {
                        _: '%d líneas copiadas',
                        1: '1 línea copiada'
                    }
                }
            },
            "bDestroy": true,
            "iDisplayLength": 10, /* paginación */
            "order": [[0, "asc"]]
        }).DataTable();
    }
});

$("#btnBuscar3").click(function () {
    if ($("#txtFechaInicio3").val() == "" && $("#txtFechaFin3").val() == "") {
        bootbox.alert("Seleccione rango de fechas");
    } else {
        if ($("#txtFechaInicio3").val() == "") {
            var txtFechaInicio = '';
        } else {
            var txtFechaInicio = obtenerFecha2($("#txtFechaInicio3").val());
        }
        if ($("#txtFechaFin3").val() == "") {
            var txtFechaFin = '';
        } else {
            var txtFechaFin = obtenerFecha2($("#txtFechaFin3").val());
        }

        $('#listadoRegistros3').show();

        tabla = $('#tblListado3').dataTable({
            "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
            "aProcessing": true, /* activa el procesamiento de DataTables */
            "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
            dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax": {
                url: '../ajax/reportesC.php?action=reportCallcenter',
                data: {
                    txtFechaInicio: txtFechaInicio,
                    txtFechaFin: txtFechaFin
                },
                type: "post",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "language": {
                "lengthMenu": "Mostrar : _MENU_ registros",
                "buttons": {
                    "copyTitle": "Tabla Copiada",
                    "copySuccess": {
                        _: '%d líneas copiadas',
                        1: '1 línea copiada'
                    }
                }
            },
            "bDestroy": true,
            "iDisplayLength": 10, /* paginación */
            "order": [[0, "asc"]]
        }).DataTable();
    }
});

init(); /* ejecuta la función inicial */

function obtenerFecha2(text) {
    var today = new Date(text);
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd
    return today;
}