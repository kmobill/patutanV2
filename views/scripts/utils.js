// export default function genericModal(openModal, closeBtn, contentId, content) {
//   contentId.innerHTML = content;
//   openModal.onclick = function () {
//     //to show the modal
//     contentId.style.display = "flex";
//   };
//   closeBtn.onclick = function () {
//     //to close the modal
//     contentId.style.display = "none";
//   };
// }

export function getInfoBlogs(id) {
  console.log("inicio el query de blogs222");
  $.post("../backend/services/methodsBlogs.php", {
    options: "getGalleryBlog",
    id: id,
  }).done(function (data, status) {
    console.log("finalizo la consulta");
    if (status !== "success") return "error en el query";
    if ("error" in data) return "error en el servidor";
    if (!("blog" in data)) return "error en el tipo de dato";
    return data.blog;
  });
}

function genericModal(idOpen, idModalRoot, idModal) {
  console.log("genericModal");
  const modal = document.getElementById(idModal);
  const open = document.getElementById(idOpen);
  const modalRoot = document.getElementById(idModalRoot);

  open.addEventListener("click", () => {
    console.log("open");
    modalRoot.classList.remove("opacity-0", "w-0", "h-0");
    modalRoot.classList.add(
      "opacity-100",
      "absolute",
      "left-0",
      "right-0",
      "top-0",
      "bottom-0",
      "w-full",
      "h-full"
    );
    // modalRoot.classList.remove("opacity-0", "w-0", "h-0");
    // modalRoot.classList.add("opacity-100", "w-full", "h-full");
  });

  modalRoot.addEventListener("click", () => {
    modalRoot.classList.add("opacity-0", "w-0", "h-0");
    modalRoot.classList.remove("opacity-100", "w-full", "h-full");
    modalRoot.classList.add("opacity-0", "w-0", "h-0");
    modalRoot.classList.remove(
      "opacity-100",
      "absolute",
      "left-0",
      "right-0",
      "top-0",
      "bottom-0",
      "w-full",
      "h-full"
    );
  });
  modal.addEventListener("click", modalClick);

  function modalClick(e) {
    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();
    return false;
  }
}
function genericModals(idsOpen, idsModalRoot, idsModal) {
  let isOpen = false;
  console.log(idsOpen);
  console.log(idsModalRoot);
  console.log(idsModal);
  idsOpen.forEach((idOpen, i) => {
    console.log("genericModal");
    const modal = document.getElementById(idsModal[i]);
    const open = document.getElementById(idsOpen[i]);
    const modalRoot = document.getElementById(idsModalRoot[i]);

    open.addEventListener("click", () => {
      console.log(isOpen);
      console.log("open");
      if (!isOpen) {
        modalRoot.classList.remove("hidden", "w-0", "h-0");
        modalRoot.classList.add(
          "flex",
          "fixed",
          "left-0",
          "right-0",
          "top-0",
          "bottom-0",
          "w-full",
          "h-full"
        );
        isOpen = true;
      }
    });

    modal.addEventListener("click", () => {
      console.log("close");
      modalRoot.classList.add("hidden", "w-0", "h-0");
      modalRoot.classList.remove(
        "flex",
        "fixed",
        "left-0",
        "right-0",
        "top-0",
        "bottom-0",
        "w-full",
        "h-full"
      );
      setTimeout(() => {
        isOpen = false;
      }, 100);
    });
  });
}
export default genericModals;
