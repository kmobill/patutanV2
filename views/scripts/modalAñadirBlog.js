// Mostrar la modal

function modalAddBlog(btn_action, btn_open, btn_close, window_modal) {
  const btnOpen = document.getElementById(btn_open);
  const windowModal = document.getElementById(window_modal);
  const btnClose = document.getElementById(btn_close);
  const btnAction = document.getElementById(btn_action);

  function actionMethod() {
    $.post("../backend/services/methodsBlogs.php", {
      options: "signIn",
      data: { user: user, pass: password },
    }).done(function (data, status) {
      console.log(data);
      console.log(status);
      console.log("finalizo la consulta");
      if (status === "success") {
        if ("error" in data) {
          console.log(data.error);
          alert(data.error);
        } else if ("signIn" in data) {
          if (data.signIn) {
            sessionStorage.removeItem("token");
            sessionStorage.setItem("token", data.token);
            verifyToken();
          } else {
            console.log("usuario o contraseña incorrectos");
          }
        }
      } else {
        console.log("error en el servidor");
      }
    });
  }
  btnOpen.onclick = function () {
    windowModal.style.display = "flex";
    console.log("click");
  };
  btnClose.onclick = function () {
    windowModal.style.display = "none";
  };

  btnAction.addEventListener("click", actionMethod);
}
