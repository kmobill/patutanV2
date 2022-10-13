// Mostrar la modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

modal.style.display = "block";
// modalImg.src = "../images/popUps/laniding-horario.jpg";

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
  console.log("click en span");
};

// Get the <span> element that closes the modal
var cierreModal = document.getElementsByClassName("modal")[0];

// When the user clicks on <span> (x), close the modal
cierreModal.onclick = function () {
  console.log("click en cierre modal");
  cierreModal.style.display = "none";
};
