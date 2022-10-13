const btnSaveBlog = document.getElementById("btnSaveBlog");
btnSaveBlog.addEventListener("click", saveBlog);

const testSendImages = document.getElementById("testSendImages");
// testSendImages.addEventListener("click", async () => console.log(await getInfoBlog("id", 1)));
testSendImages.addEventListener("click", async () => {
  // console.log(await testJSON())
  const res = await testJSON();
  const data = await res.json();
  console.log(res, data);
});

function validateFiles(files, typeOfFile) {
  let flag = true;
  console.log(files);
  console.log(typeOfFile);
  for (const file of files) {
    flag = new RegExp(typeOfFile).test(file.type);
    console.log(flag);
  }
  return flag;
}

function saveBlog(e) {
  e.preventDefault();
  console.log("saveBlog");
  //elemntos del formulario
  const formBlog = document.getElementById("formBlog");
  const fileInputFront = document.getElementById("inputImageFront");
  const fileInputGalleryImages = document.getElementById("inputImageGallery");
  //files
  const filesGallery = fileInputGalleryImages.files;
  const fileBlog = fileInputFront.files[0];
  //validaciones
  const imageType = /image.*/;
  const formValid = formBlog.checkValidity();
  const fileFrontValid = fileInputFront.files.length > 0;
  const fileGalleryValid = fileInputGalleryImages.files.length > 0;
  const filesTypeValid = validateFiles(filesGallery, imageType);

  console.log(filesGallery, fileBlog);
  console.log(filesTypeValid, fileFrontValid, fileGalleryValid, formValid);

  if (formValid && fileFrontValid && fileGalleryValid && filesTypeValid) {
    const data = {
      titleFront: document.getElementById("titleFront").value,
      description: document.getElementById("description").value,
      titleGallery: document.getElementById("titleGallery").value,
      isImportant: document.getElementById("isImportant").checked ? 1 : 0,
      userLoader: 1,
    };
    const reader = new FileReader();
    reader.readAsDataURL(fileBlog);
    reader.onload = async function (e) {
      const img = new Image();
      img.src = reader.result;
      const base64img = reader.result;
      const resultSaveBlog = await sendImage({
        img: base64img,
        imgName: fileBlog.name,
        ...data,
      });
      if ("error" in resultSaveBlog) {
        console.log(resultSaveBlog.error);
      } else if (
        "message" in resultSaveBlog &&
        "success" in resultSaveBlog &&
        resultSaveBlog.success
      ) {
        console.log(resultSaveBlog.message);
        console.log([...Object.keys(data)], [...Object.values(data)]);
        const resultInfoBlog = await getInfoBlog(
          [...Object.keys(data)],
          [...Object.values(data)]
        );
        console.log(resultInfoBlog);
        if (Array.isArray(resultInfoBlog)) {
          console.log("is array");
          if (resultInfoBlog[0] && resultInfoBlog[0]["id"]) {
            const idBlogGetted = resultInfoBlog[0]["id"];
            console.log(idBlogGetted);
            for (const fileGallery of filesGallery) {
              const readerAux = new FileReader();
              readerAux.onload = function (e) {
                saveGalleryBlog({
                  img: readerAux.result,
                  imgName: fileGallery.name,
                  idBlog: idBlogGetted,
                  userLoader: 1,
                });
              };
              readerAux.readAsDataURL(fileGallery);
            }
          }
        } else {
          console.log("no es array");
        }
      } else {
        console.log("error desconocido");
      }
    };
  } else {
    if (!formValid) {
      formBlog.reportValidity();
    }
    if (!fileFrontValid) {
      Swal.fire({
        title: "¡Error!",
        text: "Por favor seleccione una imagen de portada",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
    }
    if (!fileGalleryValid) {
      Swal.fire({
        title: "¡Error!",
        text: "Por favor seleccione al menos una imagen para la galería",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
    }
    if (!filesTypeValid) {
      Swal.fire({
        title: "¡Error!",
        text: "Todos los archivos deben ser imágenes",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
    }
    console.log("cant save");
  }
}

function getInfoBlog(ops, values) {
  return $.post("../backend/services/methodsBlogs.php", {
    options: "getInfoBlog",
    ops: ops,
    values: values,
  }).promise();
}
// function getInfoBlog(option, value) {
//   const data = new FormData();
//   data.append("options", "getInfoBlog");
//   data.append("option", option);
//   data.append("value", value);
//   return fetch("../backend/services/methodsBlogs.php", {
//     method: "POST",
//     body: data,
//   })
// }
function testJSON(data = { example1: 123123, example2: "hola" }) {
  const dataExample = new FormData();
  dataExample.append("example1", data.example1);
  dataExample.append("example2", data.example2);
  const dataToSend = new FormData();
  dataToSend.append("options", "testJSON");
  dataToSend.append("data", dataExample);
  return fetch("../backend/services/methodsBlogs.php", {
    method: "POST",
    body: dataToSend,
  });
}
// function sendImage(
//   data,
//   callback = () => {
//     console.log("callback sendImage");
//   },
//   callbackParams = {}
// ) {
//   $.post("../backend/services/methodsBlogs.php", {
//     options: "saveBlog",
//     data: data,
//   }).done(function (data, status) {
//     console.log("finalizo la consulta saveBlog");
//     console.log(data);
//     console.log(status);
//     if (status === "success") {
//       if ("error" in data) {
//         console.log(data.error);
//         alert(data.error);
//       } else if ("message" in data) {
//         console.log(data.message);
//         console.log("va a empezar el callback");
//         return callback(callbackParams.ops, callbackParams.values);
//       } else {
//         console.log("error en el servidor");
//       }
//     }
//     return null;
//   });
// }
function sendImage(data) {
  return $.post("../backend/services/methodsBlogs.php", {
    options: "saveBlog",
    data: data,
  }).promise();
}

function saveGalleryBlog(dataToSend) {
  console.log("sendImages");
  console.log(dataToSend);
  $.post("../backend/services/methodsBlogs.php", {
    options: "galleryImages",
    data: dataToSend,
  }).done(function (data, status) {
    if ("error" in data) {
      console.log(data.error);
    } else if ("message" in data && "success" in data && data.success) {
      console.log("se guardo la imagen: ", dataToSend.name);
    } else {
      console.log("error al guardar la imagen: ", dataToSend.name);
    }
  });
}
