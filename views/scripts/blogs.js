import genericModals from "./utils.js";
import { generateCarouselLogic } from "./Carrousel.js";

const container_blogs = document.getElementById("container-blogs");

function addEventBlog(dataBlogs) {
  //for modals
  const blogsIDs = [];
  const ModalIDs = [];
  const ModalRootIDs = [];
  //for carrousel
  const carrouselIDs = [];
  const buttonsIDs = [];
  const activeIDs = [];
  let i = 0;
  for (const blog of container_blogs.children) {
    const id = blog.id.split("-")[2];
    blogsIDs.push(blog.id);
    ModalRootIDs.push(`modal-root-${id}`);
    ModalIDs.push(`modal-${id}`);
    carrouselIDs.push(`carousel-${id}`);
    buttonsIDs.push(`data-carousel-button-${id}`);
    activeIDs.push(`data-carousel-active-${id}`);
    getInfoBlogs(id, `content-carousel-${id}`, dataBlogs[i]);
    i++;
  }

  generateCarouselLogic(buttonsIDs, activeIDs, carrouselIDs);
  genericModals(blogsIDs, ModalRootIDs, ModalIDs);
}
function getInfoBlogs(id, idContainer, dataBlog) {
  console.log(dataBlog);
  console.log(idContainer);
  console.log("inicio el query de blogs222");
  $.post("../backend/services/methodsBlogs.php", {
    options: "getGalleryImages",
    id: id,
  }).done(function (data, status) {
    console.log("finalizo la consulta");
    console.log(data);
    console.log(status);
    if (status === "success") {
      if ("error" in data) {
        console.log(data.error);
        // alert(data.error);
      } else if ("blogImages" in data) {
        console.log(data.blogImages);
        const container = document.getElementById(idContainer);
        container.innerHTML = "";
        data.blogImages.map((blogImages, i) => {
          container.innerHTML += `<li class="hidden" ${i == 0 ? `data-carousel-active-${id}` : ""
            }>
            <img class="h-full w-[600px] m-auto" src="${blogImages.urlImage
            }" alt="desert_image" />
            <div class="flex flex-col p-2 bg-slate-800 rounded-b-md">
                <h1 class = 'text-md mb-2'>${dataBlog.titleGallery}</h1>
                <p class = 'text-sm'>
                  ${dataBlog.description}
                </p>
            </div>
          </li>`;
        });
      }
    }
  });
}

function cardPortadaBlog(urlImage, title, id) {
  // onclick="testFunction(1)"
  return `
  <div id="blog-card-${id}" class="rounded-md bg-slate-900 p-2 flex flex-col justify-between items-center gap-2 text-slate-300 cursor-pointer">
    <h2 class = 'text-center'>${title}</h2>
    <img class = 'w-full h-[90%]' src="${urlImage}" alt="${title}">    
    <section id="modal-root-${id}" class="bg-[rgb(0,0,0,0.8)] w-0 h-0 m-auto p-[0.15rem] rounded-sm text-slate-200 text-center flex-col justify-center items-center hidden z-10">
      <section  class="relative w-[min(90%,500px)] z-20">
        <section id="carousel-${id}">
            <button  class="text-slate-100 outline-none rounded-sm absolute text-4xl -top-10 p-4 -right-14 z-30" id="modal-${id}">x</button>            
            <button class="text-slate-100 outline-none border-none rounded-sm absolute text-7xl top-1/2 p-4 -left-14 z-30" data-carousel-button-${id}="prev">
                &#8249;
            </button>
            <button class="text-slate-100 outline-none border-none rounded-sm absolute text-7xl top-1/2 p-4 -right-14 z-30" data-carousel-button-${id}="next">
                &#8250;
            </button>
            <ul id='content-carousel-${id}' class="p-[0.5rem] bg-slate-900 rounded-md text-left" data-carousel-items>
               
            </ul>
        </section>
      </section>
    </section>
  </div>
  `;
}

function getBlogs() {
  console.log("inicio el query de blogs");
  $.post("../backend/services/methodsBlogs.php", {
    options: "getBlogs",
  }).done(function (data, status) {
    console.log("finalizo la consulta");
    console.log(status);
    console.log(data);
    if (status === "success") {
      if ("error" in data) {
        console.log(data.error);
        alert(data.error);
      } else if ("blogs" in data) {
        console.log(data);
        const dataBlogs = [];
        data.blogs.map((blog) => {
          dataBlogs.push(blog);
          container_blogs.innerHTML += cardPortadaBlog(
            blog.urlImageFrontPage,
            blog.titleFront,
            blog.id
          );
        });
        addEventBlog(dataBlogs);
      } else {
        console.log(data);
      }
    } else {
      console.log("error en el servidor");
    }
  });
}

getBlogs();
