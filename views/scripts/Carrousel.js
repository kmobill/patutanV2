export function generateCarouselLogic(carouselButtonsArray, active, carousels) {
  console.log(carouselButtonsArray);
  console.log(active);
  console.log(carousels);
  carousels.forEach((carouselAux, i) => {
    const carousel = document.getElementById(carouselAux);
    const carouselButtons = carousel.querySelectorAll(
      `[${carouselButtonsArray[i]}]`
    );
    carouselButtons.forEach((button) => {
      console.log(button.dataset[`carouselButton-${i + 1}`]);
      if (button.dataset[`carouselButton-${i + 1}`] === "next") {
        button.addEventListener("click", () => {
          const currentActiveItem = document.querySelector(`[${active[i]}]`);
          currentActiveItem.removeAttribute(active[i]);

          const nextSibling = currentActiveItem.nextElementSibling;
          !nextSibling
            ? currentActiveItem.parentElement.firstElementChild.setAttribute(
                active[i],
                ""
              )
            : nextSibling.setAttribute(active[i], "");
        });
      } else if (button.dataset[`carouselButton-${i + 1}`] === "prev") {
        button.addEventListener("click", () => {
          const currentActiveItem = document.querySelector(`[${active[i]}]`);
          currentActiveItem.removeAttribute(active[i]);

          const previousSibiling = currentActiveItem.previousElementSibling;
          !previousSibiling
            ? currentActiveItem.parentElement.lastElementChild.setAttribute(
                active[i],
                ""
              )
            : previousSibiling.setAttribute(active[i], "");
        });
      }
    });
  });
}
export default function init() {
  const carousel = document.getElementById("carousel");
  const carouselButtons = carousel.querySelectorAll("[data-carousel-button]");
  carouselButtons.forEach((button) => {
    if (button.dataset.carouselButton === "next") {
      button.addEventListener("click", () => {
        const currentActiveItem = document.querySelector(
          "[data-carousel-active]"
        );
        currentActiveItem.removeAttribute("data-carousel-active");

        const nextSibling = currentActiveItem.nextElementSibling;
        !nextSibling
          ? currentActiveItem.parentElement.firstElementChild.setAttribute(
              "data-carousel-active",
              ""
            )
          : nextSibling.setAttribute("data-carousel-active", "");
      });
    } else if (button.dataset.carouselButton === "prev") {
      button.addEventListener("click", () => {
        const currentActiveItem = document.querySelector(
          "[data-carousel-active]"
        );
        currentActiveItem.removeAttribute("data-carousel-active");

        const previousSibiling = currentActiveItem.previousElementSibling;
        !previousSibiling
          ? currentActiveItem.parentElement.lastElementChild.setAttribute(
              "data-carousel-active",
              ""
            )
          : previousSibiling.setAttribute("data-carousel-active", "");
      });
    }
  });
}
