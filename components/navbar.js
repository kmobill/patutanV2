const $ = selector => document.querySelector(selector)

let navbarOpen = false
const $navbar = $('#navbar')
const $btn_hamburguer = $('#btn_hamburguer')
const $nav_barra = $('#nav_barra')

const checkNavbar = ($navbar, navbarOpen) => {
  if (navbarOpen) {
    $navbar.classList.add("h-72");
    $navbar.classList.remove("h-16");
    $nav_barra.classList.add("flex")
    $nav_barra.classList.remove("hidden")
  } else {
    $navbar.classList.remove("h-72");
    $navbar.classList.add("h-16");
    $nav_barra.classList.remove("flex")
    $nav_barra.classList.add("hidden")
  }
}

checkNavbar($navbar, navbarOpen)
$btn_hamburguer.addEventListener("click", () => {
  navbarOpen = !navbarOpen;
  checkNavbar($navbar, navbarOpen)
});