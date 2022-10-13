const ahorroCards = [
  document.getElementById("cardAhorro"),
  document.getElementById("cardAhorro2"),
  document.getElementById("cardCarouselAhorro"),
  document.getElementById("cardCarouselAhorro2"),
];
const creditoCards = [
  document.getElementById("cardCredito"),
  document.getElementById("cardCredito2"),
  document.getElementById("cardCarouselCredito"),
  document.getElementById("cardCarouselCredito2"),
];
const inversionCards = [
  document.getElementById("cardInversion"),
  document.getElementById("cardInversion2"),
  document.getElementById("cardCarouselInversion"),
  document.getElementById("cardCarouselInversion2"),
];

let flagAhorro = true;
let flagCredito = true;
let flagInversion = true;

ahorroCards.forEach((card) => {
  card.addEventListener("click", handleCardAhorro);
});
creditoCards.forEach((card) => {
  card.addEventListener("click", handleCardCredito);
});
inversionCards.forEach((card) => {
  card.addEventListener("click", handleCardInversion);
});

function handleCardAhorro() {
  console.log("click!");
  ahorroCards.forEach((card, i) => {
    if (flagAhorro) {
      if (i % 2 === 0) {
        card.classList.add("hidden");
        card.classList.remove("block");
      } else {
        card.classList.add("block");
        card.classList.remove("hidden");
      }
    } else {
      if (i % 2 === 0) {
        card.classList.remove("hidden");
        card.classList.add("block");
      } else {
        card.classList.remove("block");
        card.classList.add("hidden");
      }
    }
  });
  flagAhorro = !flagAhorro;
}
function handleCardCredito() {
  console.log("click!");
  creditoCards.forEach((card, i) => {
    if (flagCredito) {
      if (i % 2 === 0) {
        card.classList.add("hidden");
        card.classList.remove("block");
      } else {
        card.classList.add("block");
        card.classList.remove("hidden");
      }
    } else {
      if (i % 2 === 0) {
        card.classList.remove("hidden");
        card.classList.add("block");
      } else {
        card.classList.remove("block");
        card.classList.add("hidden");
      }
    }
  });
  flagCredito = !flagCredito;
}
function handleCardInversion() {
  console.log("click!");
  inversionCards.forEach((card, i) => {
    if (flagInversion) {
      if (i % 2 === 0) {
        card.classList.add("hidden");
        card.classList.remove("block");
      } else {
        card.classList.add("block");
        card.classList.remove("hidden");
      }
    } else {
      if (i % 2 === 0) {
        card.classList.remove("hidden");
        card.classList.add("block");
      } else {
        card.classList.remove("block");
        card.classList.add("hidden");
      }
    }
  });
  flagInversion = !flagInversion;
}
