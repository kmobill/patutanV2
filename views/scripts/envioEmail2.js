var tabla;


function logSubmit(e) {
  e.preventDefault();  
  const formData = new FormData($("#form_solicitud_contacto")[0]);
  $.ajax({
    url: "../ajax/solicitudInformacion.php?action=envioMail",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      if (datos == 'Mail enviado') {
        alert('Solicitud enviada, pronto uno uno de nuestros agentes se comunicará con ud!...');
        document.getElementById("form_solicitud_contacto").reset();
      } else if (datos == 'test2') {
        alert('test2')
      }
      else {
        alert('No se ha podido enviar su solicitud:', datos);
        console.log("error: ", datos)
      }
    }
  });
}

const form = document.getElementById("form_solicitud_contacto");
form.addEventListener('submit', logSubmit);