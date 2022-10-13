var tabla;
function init() { /* función inicial */
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    $("#btnGuardar").prop("disabled", true);
    $("#txtProducto").hide();
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
}

$("#producto").change(function () {
    var txt = $('#producto option:selected').html();
    $("#txtProducto").val(txt);
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        // url: "../ajax/solicitudCreditoC.php?action=envioMail",
        url: "../ajax/solicitudCreditoC.php?action=envioMail",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            if (datos == 'Mail enviado'){
                alert('Solicitud enviada, pronto uno uno de nuestros agentes se comunicará con ud!...');
                limpiar_formulario();
            } else {
                alert('No se ha podido enviar su solicitud');
            }
        }
    });
}

init(); /* ejecuta la función inicial */

