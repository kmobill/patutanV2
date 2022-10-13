const idBlog = document.getElementById("idBlog").dataset.srcblog;
const pageContent = document.getElementById("pageContent");

function getInfoBlogs(id) {
  console.log("inicio el query de blogs222");
  $.post("../backend/services/methodsBlogs.php", {
    options: "getGalleryBlog",
    id: id,
  }).done(function (data, status) {
    console.log("finalizo la consulta");
    // console.log(status);
    // console.log(data);
    if (status === "success") {
      if ("error" in data) {
        console.log(data.error);
        alert(data.error);
      } else if ("blog" in data) {
        console.log(data);
        pageContent.innerHTML = "";

        pageContent.innerHTML += `
        <div class="flex flex-col gap-2">
          <h1 class = 'text-lg'>${data.blog.titleGallery}</h1>
          <p>${data.blog.description}</p>
        </div>
        <section class='w-[90%] m-auto grid grid-cols-[repeat(auto-fit,minmax(22rem,1fr))] gap-5' id = 'gallery'></section>`;
        getGalleryImages(id);
      }
    } else {
      console.log("error en el servidor");
    }
  });
}

function getGalleryImages(id) {
  const gallery = document.getElementById("gallery");
  $.post("../backend/services/methodsBlogs.php", {
    options: "getGalleryImages",
    id: id,
  }).done(function (data, status) {
    if (status === "success") {
      if ("error" in data) {
        console.log(data.error);
        alert(data.error);
      } else if ("blogImages" in data) {
        console.log(data);
        data.blogImages.map((blogData) => {
          gallery.innerHTML += cardPortadaBlog(blogData.urlImage, id);
        });
      }
    } else {
      console.log("error en el servidor");
    }
  });
}
function test(id) {
  console.log("test: ", id);
}
function cardPortadaBlog(urlImage, id) {
  return `
  <div id="blog-card-${id}" onclick="test(${id})" class="rounded-md bg-slate-900 p-2 flex flex-col justify-between items-center gap-2 text-slate-300 cursor-pointer">
    <img class = 'w-full' src="${urlImage}" alt="image_${id}">
  </div>
  `;
}
console.log(idBlog);
getInfoBlogs(idBlog);
