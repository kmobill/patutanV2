$.ajax({
  url: "../backend/services/methodsBlogs.php",
  type: "POST",
  data: { options: "test options" },
  contentType: false,
  processData: false,
  success: function (datos) {
    console.log(datos);
  },
});
