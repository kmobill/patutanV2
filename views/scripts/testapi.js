const btn_test_api = document.getElementById("test-api-btn");
const test_value = document.getElementById("test-value");
btn_test_api.addEventListener("click", function (e) {
  console.log("se hizo click");
  $.post("../backend/services/methodsBlogs.php", {
    options: "insertBlog",
    data: { user: "admin", pass: "123456" },
  }).done(function (data, status) {
    console.log("finalizo la consulta");
    if (status === "success") {
      if ("error" in data) {
        console.log(data.error);
        alert(data.error);
      } else {
        console.log(data);
        test_value.innerHTML = JSON.stringify(data);
      }
    } else {
      console.log("error");
    }
  });
});
