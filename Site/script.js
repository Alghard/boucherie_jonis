//DEBUT Script de sticky search bar

const search = document.querySelector("#search-bar");
const header = document.querySelector("header");
let isFixed = false; // Variable pour suivre si la barre est fixe
function scrolled() {
    // Condition modifiée pour déclencher le changement de classe dès que l'en-tête disparaît de l'écran
    if (scrollY >= 305 && !isFixed) {
        search.classList.add("fixed");
        search.classList.remove("original");
        isFixed = true;
    } else if (scrollY < 306 && isFixed) {
        search.classList.add("original");
        search.classList.remove("fixed");
        isFixed = false;
    }
}
addEventListener("scroll", scrolled, false);
addEventListener("scroll", () => {
    console.log(`
    Hauteur page : ${document.body.scrollHeight}
    Hauteur affichage : ${innerHeight}
    Scroll Position : ${scrollY}
    isFixed : ${isFixed}`);
});

//FIN Script de sticky search bar
