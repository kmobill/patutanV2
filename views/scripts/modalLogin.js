// Mostrar la modal
const open_modal_btn = document.getElementById("open-modal-btn");
const signIn_window = document.getElementById("signIn-window");
const close_btn = document.getElementById("close-btn");
const blog_signIn_btn = document.getElementById("blog-signIn");
const logOut_btn = document.getElementById("logOut-btn");
// const testBTN = document.getElementById("testBTN");
const container_btn_add = document.getElementById("container-btn-add-blog");

logOut_btn.style.display = "none"; //btn logout close by default

open_modal_btn.onclick = function () {
  signIn_window.style.display = "flex";
  console.log("click");
};

close_btn.onclick = function () {
  signIn_window.style.display = "none";
};

logOut_btn.addEventListener("click", function () {
  ressetAuthentification();
});

blog_signIn_btn.addEventListener("click", function (e) {
  e.preventDefault();
  const password = document.getElementById("login-blog-pass").value;
  const user = document.getElementById("login-blog-user").value;
  console.log(user);
  console.log(password);
  console.log("se hizo click");
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
});

function ressetAuthentification() {
  console.log("reseteando autentificacion");
  sessionStorage.removeItem("token"); //se remueve el token
  signIn_window.style.display = "none";
  open_modal_btn.style.display = "block";
  logOut_btn.style.display = "none";
  document.getElementById("añadir-blog-btn").remove();
}
function setAuthentication(token) {
  signIn_window.style.display = "none";
  open_modal_btn.style.display = "none";
  logOut_btn.style.display = "block";
  sessionStorage.setItem("token", token);
}

function verifyToken() {
  console.log("iniciando verifyToken");
  const token = sessionStorage.getItem("token");
  console.log(token);
  if (token && token !== "undefined" && token !== "") {
    console.log(token);
    $.post("../backend/services/methodsBlogs.php", {
      options: "verifyToken",
      token: token,
    }).done(function (data, status) {
      console.log(data);
      console.log(status);
      console.log("finalizo la consulta");
      if (status === "success") {
        if ("error" in data) {
          console.log(data.error);
          alert(data.error);
        } else if ("validate" in data) {
          if (data.validate) {
            container_btn_add.innerHTML += `
              <div id ='añadir-blog-btn' class="rounded-md m-auto w-[min(150px,100%)] h-[min(75px,100%)] bg-slate-900 p-2 flex flex-col justify-center items-center gap-2 text-slate-300 cursor-pointer">          
                <button >Añadir blog +</button>      
              </div>
            `;
            setAuthentication(token);
          } else {
            ressetAuthentification();
            console.log("El token es incorrecto");
            sessionStorage.removeItem("token"); //se remueve el token
          }
        } else {
          ressetAuthentification();
          console.log("error en el servidor");
        }
      } else {
        ressetAuthentification();
        console.log("error en el servidor");
      }
    });
  } else {
    console.log("token no existente");
  }
}
verifyToken();
