function getBlogs() {
  $.post("../backend/services/methodsBlogs.php", {
    options: "getPortadasBlogs",
    data: {},
  }).done(function (data, status) {
    console.log("finalizo la consulta");
    if (status === "success") {
      if ("error" in data) {
        console.log(data.error);
        alert(data.error);
      } else if ("blogs" in data) {
        console.log(data);
      }
    } else {
      console.log("error en el servidor");
    }
  });
}

export default getBlogs;
