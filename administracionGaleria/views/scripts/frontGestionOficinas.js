var tabla;
var tabla1;
function init() { /* función inicial */
    mostrar_todos();
    mostrar_todos1();
//    $('#filtros').hide();
    
    $('#divTipoCliente').hide();
    $('#eAgencia').hide();

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=region',
        success: function (r) {
            $("#txtRegion").html(r);
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=agencias',
        success: function (r) {
            $("#txtAgencia").html(r);
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroNPS',
        success: function (r) {
            if (r >= 85.00 && r <= 100) {
                $("#txtNPS").val(r).trigger("change");
                $('#txtNPS').trigger('configure',{fgColor:"#32A51E"});
                $('#txtNPS').css("color", "#32A51E");
            } else if (r >= 60.00 && r <= 84.99) {
                $("#txtNPS").val(r).trigger("change");
                $('#txtNPS').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtNPS').css("color", "#E7DC03");
            } else if (r <= 59.99) {
                $("#txtNPS").val(r).trigger("change");
                $('#txtNPS').trigger('configure',{fgColor:"#AB412A"});
                $('#txtNPS').css("color", "#AB412A");
            } 
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroINS',
        success: function (r) {
            if (r >= 80.00 && r <= 100) {
                $("#txtINS").val(r).trigger("change");
                $('#txtINS').trigger('configure',{fgColor:"#32A51E"});
                $('#txtINS').css("color", "#32A51E");
            } else if (r >= 60.00 && r <= 79.99) {
                $("#txtINS").val(r).trigger("change");
                $('#txtINS').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtINS').css("color", "#E7DC03");
            } else if (r <= 59.99) {
                $("#txtINS").val(r).trigger("change");
                $('#txtINS').trigger('configure',{fgColor:"#AB412A"});
                $('#txtINS').css("color", "#AB412A");
            }
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroCES',
        success: function (r) {
            if (r >= 0.00 && r <= 14.99) {
                $("#txtCES").val(r).trigger("change");
                $('#txtCES').trigger('configure',{fgColor:"#32A51E"});
                $('#txtCES').css("color", "#32A51E");
            } else if (r >= 15.00 && r <= 29.99) {
                $("#txtCES").val(r).trigger("change");
                $('#txtCES').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtCES').css("color", "#E7DC03");
            } else if (r >= 30.00) {
                $("#txtCES").val(r).trigger("change");
                $('#txtCES').trigger('configure',{fgColor:"#AB412A"});
                $('#txtCES').css("color", "#AB412A");
            }
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroVision',
        success: function (r) {
            if (r >= 80.00 && r <= 100) {
                $("#txtVision").val(r).trigger("change");
                $('#txtVision').trigger('configure',{fgColor:"#32A51E"});
                $('#txtVision').css("color", "#32A51E");
            } else if (r >= 60.00 && r <= 79.99) {
                $("#txtVision").val(r).trigger("change");
                $('#txtVision').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtVision').css("color", "#E7DC03");
            } else if (r <= 59.99) {
                $("#txtVision").val(r).trigger("change");
                $('#txtVision').trigger('configure',{fgColor:"#AB412A"});
                $('#txtVision').css("color", "#AB412A");
            }
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=progressNPS',
        success: function (r) {
            var array = [r];
            console.log(array);

            $("#barraNPS").append('<div class="progress-bar progress-bar-success" role="progressbar" style="width: 100%">Detractores' + array[0] + '</div>');
        }
    });
}

function mostrar_todos() {
    tabla = $('#tblListado').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, /* activa el procesamiento de DataTables */
        "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
        dom: '<<>>', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/frontPrincipalC.php?action=selectAllLealtad',
            type: "get",
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

function mostrar_todos1() {
    tabla1 = $('#tblListado1').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, /* activa el procesamiento de DataTables */
        "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
        dom: '<<>>', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/frontPrincipalC.php?action=selectAllPilares',
            type: "POST",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "createdRow": function (row, data, dataIndex) {
            // Use empty value in the "Office" column
            // as an indication that grouping with COLSPAN is needed
            if (data[0] === 'TOTAL PILARES') {
                // Hide required number of columns
                // next to the cell with COLSPAN attribute
                $('td:eq(1)', row).css('display', 'none');
                // Add COLSPAN attribute
                $('td:eq(2)', row).attr('colspan', 2);
            }
            if (data[0] === 'TOTAL PILARES') {
                // Hide required number of columns
                // next to the cell with COLSPAN attribute
                $('td:eq(3)', row).css('display', 'none');
                // Add COLSPAN attribute
                $('td:eq(4)', row).attr('colspan', 2);
            }
            if (data[0] === 'TOTAL PILARES') {
                // Hide required number of columns
                // next to the cell with COLSPAN attribute
                $('td:eq(5)', row).css('display', 'none');
                // Add COLSPAN attribute
                $('td:eq(6)', row).attr('colspan', 2);
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

$("#txtRegion").change(function () {
    var txtRegion = $("#txtRegion").val();
    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=agenciasList',
        data: {txtRegion: txtRegion},
        success: function (r) {
            $("#txtAgencia").val("");
            $("#txtAgencia").html(r);
        }
    });
});

$("#txtArea").change(function () {
    var txtArea = $("#txtArea").val();
    if (txtArea == 'Servicios') {
        $("#txtSeccion").append('<option>Front de servicios</option>');
        $("#txtSeccion").append('<option>Cajas</option>');
    } else {
        $("#txtSeccion").append('<option value="">Todas</option>');
    }
});

$("#txtAgencia").change(function () {
    var txtAgencia = $("#txtAgencia").val();
    $("#txtAgencia1").val(txtAgencia);
});

$("#btnBuscar").click(function () {
    var txtRegion = $("#txtRegion").val();
    var txtAgencia = $("#txtAgencia1").val();
    var txtTipoCliente = $("#txtTipoCliente").val();
    if ($("#txtFechaInicio").val() == ""){
        var txtFechaInicio = '';
    }else{
        var txtFechaInicio = obtenerFecha2($("#txtFechaInicio").val());
    }
    if ($("#txtFechaFin").val() == ""){
        var txtFechaFin = '';
    }else{
        var txtFechaFin = obtenerFecha2($("#txtFechaFin").val());
    }
    var txtArea = '';
    var txtSeccion = '';

    tabla = $('#tblListado').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, /* activa el procesamiento de DataTables */
        "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
        dom: '<<>>', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/frontPrincipalC.php?action=selectAllLealtadFiltros',
            data: {
                txtRegion: txtRegion,
                txtAgencia: txtAgencia,
                txtTipoCliente: txtTipoCliente,
                txtFechaInicio: txtFechaInicio,
                txtFechaFin: txtFechaFin,
                txtArea: txtArea,
                txtSeccion: txtSeccion,
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

    tabla1 = $('#tblListado1').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, /* activa el procesamiento de DataTables */
        "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
        dom: '<<>>', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/frontPrincipalC.php?action=selectAllPilaresFiltros',
            data: {
                txtRegion: txtRegion,
                txtAgencia: txtAgencia,
                txtTipoCliente: txtTipoCliente,
                txtFechaInicio: txtFechaInicio,
                txtFechaFin: txtFechaFin,
                txtArea: txtArea,
                txtSeccion: txtSeccion
            },
            type: "post",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "createdRow": function (row, data, dataIndex) {
            // Use empty value in the "Office" column
            // as an indication that grouping with COLSPAN is needed
            if (data[0] === 'TOTAL PILARES') {
                // Hide required number of columns
                // next to the cell with COLSPAN attribute
                $('td:eq(1)', row).css('display', 'none');
                // Add COLSPAN attribute
                $('td:eq(2)', row).attr('colspan', 2);
            }
            if (data[0] === 'TOTAL PILARES') {
                // Hide required number of columns
                // next to the cell with COLSPAN attribute
                $('td:eq(3)', row).css('display', 'none');
                // Add COLSPAN attribute
                $('td:eq(4)', row).attr('colspan', 2);
            }
            if (data[0] === 'TOTAL PILARES') {
                // Hide required number of columns
                // next to the cell with COLSPAN attribute
                $('td:eq(5)', row).css('display', 'none');
                // Add COLSPAN attribute
                $('td:eq(6)', row).attr('colspan', 2);
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

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroNPSFiltros',
        data: {
            txtRegion: txtRegion,
            txtAgencia: txtAgencia,
            txtTipoCliente: txtTipoCliente,
            txtFechaInicio: txtFechaInicio,
            txtFechaFin: txtFechaFin,
            txtArea: txtArea,
            txtSeccion: txtSeccion
        },
        success: function (r) {
            if (r >= 85.00 && r <= 100) {
                $("#txtNPS").val(r).trigger("change");
                $('#txtNPS').trigger('configure',{fgColor:"#32A51E"});
                $('#txtNPS').css("color", "#32A51E");
            } else if (r >= 60.00 && r <= 84.99) {
                $("#txtNPS").val(r).trigger("change");
                $('#txtNPS').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtNPS').css("color", "#E7DC03");
            } else if (r <= 59.99) {
                $("#txtNPS").val(r).trigger("change");
                $('#txtNPS').trigger('configure',{fgColor:"#AB412A"});
                $('#txtNPS').css("color", "#AB412A");
            }
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroINSFiltros',
        data: {
            txtRegion: txtRegion,
            txtAgencia: txtAgencia,
            txtTipoCliente: txtTipoCliente,
            txtFechaInicio: txtFechaInicio,
            txtFechaFin: txtFechaFin,
            txtArea: txtArea,
            txtSeccion: txtSeccion
        },
        success: function (r) {
            if (r >= 80.00 && r <= 100) {
                $("#txtINS").val(r).trigger("change");
                $('#txtINS').trigger('configure',{fgColor:"#32A51E"});
                $('#txtINS').css("color", "#32A51E");
            } else if (r >= 60.00 && r <= 79.99) {
                $("#txtINS").val(r).trigger("change");
                $('#txtINS').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtINS').css("color", "#E7DC03");
            } else if (r <= 59.99) {
                $("#txtINS").val(r).trigger("change");
                $('#txtINS').trigger('configure',{fgColor:"#AB412A"});
                $('#txtINS').css("color", "#AB412A");
            }
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroCESFiltros',
        data: {
            txtRegion: txtRegion,
            txtAgencia: txtAgencia,
            txtTipoCliente: txtTipoCliente,
            txtFechaInicio: txtFechaInicio,
            txtFechaFin: txtFechaFin,
            txtArea: txtArea,
            txtSeccion: txtSeccion
        },
        success: function (r) {
            if (r >= 0.00 && r <= 14.99) {
                $("#txtCES").val(r).trigger("change");
                $('#txtCES').trigger('configure',{fgColor:"#32A51E"});
                $('#txtCES').css("color", "#32A51E");
            } else if (r >= 15.00 && r <= 29.99) {
                $("#txtCES").val(r).trigger("change");
                $('#txtCES').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtCES').css("color", "#E7DC03");
            } else if (r >= 30.00) {
                $("#txtCES").val(r).trigger("change");
                $('#txtCES').trigger('configure',{fgColor:"#AB412A"});
                $('#txtCES').css("color", "#AB412A");
            }
        }
    });

    $.ajax({
        type: "POST",
        url: '../ajax/frontPrincipalC.php?action=tacometroVisionFiltros',
        data: {
            txtRegion: txtRegion,
            txtAgencia: txtAgencia,
            txtTipoCliente: txtTipoCliente,
            txtFechaInicio: txtFechaInicio,
            txtFechaFin: txtFechaFin,
            txtArea: txtArea,
            txtSeccion: txtSeccion
        },
        success: function (r) {
            if (r >= 80.00 && r <= 100.00) {
                $("#txtVision").val(r).trigger("change");
                $('#txtVision').trigger('configure',{fgColor:"#32A51E"});
                $('#txtVision').css("color", "#32A51E");
            } else if (r >= 60. && r <= 79.99) {
                $("#txtVision").val(r).trigger("change");
                $('#txtVision').trigger('configure',{fgColor:"#E7DC03"});
                $('#txtVision').css("color", "#E7DC03");
            } else if (r <= 59.99) {
                $("#txtVision").val(r).trigger("change");
                $('#txtVision').trigger('configure',{fgColor:"#AB412A"});
                $('#txtVision').css("color", "#AB412A");
            }
        }
    });

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