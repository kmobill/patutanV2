function logSubmit(e) {
  e.preventDefault();
  const formData = new FormData($("#formulario_cuenta")[0]);
  $.ajax({
    url: "../ajax/solicitudCuentaC.php?action=envioMail",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      if (datos == "Mail enviado") {
        alert(
          "Solicitud enviada, pronto uno uno de nuestros agentes se comunicará con ud!..."
        );
        document.getElementById("formulario_cuenta").reset();
      } else if (datos == "test2") {
        alert("test2");
      } else {
        alert("No se ha podido enviar su solicitud:", datos);
        console.log("error: ", datos);
      }
    },
  });
}

const form = document.getElementById("formulario_cuenta");
form.addEventListener("submit", logSubmit);
