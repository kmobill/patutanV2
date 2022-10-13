function saveBlog() {
  const fileInput = document.getElementById("inputImageFront");
  const fileDisplayArea = document.getElementById("fileDisplayArea");
  const data = {
    titleFront: "titleFront",
    description: "description",
    titleGallery: "titleGallery",
    isImportant: true,
    userLoader: 1,
  };
  let base64img;
  fileInput.addEventListener("change", function (e) {
    const file = fileInput.files[0];
    const imageType = /image.*/;

    if (file.type.match(imageType)) {
      const reader = new FileReader();

      reader.onload = function (e) {
        fileDisplayArea.innerHTML = "";

        const img = new Image();
        img.src = reader.result;
        base64img = reader.result;
        fileDisplayArea.appendChild(img);
        sendImage({ img: base64img, imgName: file.name, ...data });
      };
      reader.readAsDataURL(file);
    } else {
      fileDisplayArea.innerHTML = "File not supported!";
    }
  });
}
function sendImage(data) {
  console.log("sendImage");
  $.post("../backend/services/methodsBlogs.php", {
    options: "saveBlog",
    data: data,
  }).done(function (data, status) {
    console.log("finalizo la consulta");
    console.log(data);
    console.log(status);
    if (status === "success") {
      if ("error" in data) {
        console.log(data.error);
        alert(data.error);
      } else if ("message" in data) {
        console.log(data.message);
      } else {
        console.log("error en el servidor");
      }
    }
  });
}
saveBlog();
