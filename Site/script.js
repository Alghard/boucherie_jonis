//DEBUT Script de sticky search bar

const search = document.querySelector("#search-bar");
const header = document.querySelector("header");
const headerOffset = header.offsetHeight;
let isFixed = false; // Variable pour suivre si la barre est fixe
function scrolledSearchBar() {
    // Condition modifiée pour déclencher le changement de classe dès que l'en-tête disparaît de l'écran
    if (scrollY >= headerOffset && !isFixed) {
        search.classList.add("fixed");
        search.classList.remove("original");
        isFixed = true;
    } else if (scrollY < headerOffset && isFixed) {
        search.classList.add("original");
        search.classList.remove("fixed");
        isFixed = false;
    }
}
addEventListener("ontouchmove", scrolledSearchBar, false); //For mobile
addEventListener("scroll", scrolledSearchBar, false); //For computer
// addEventListener("scroll", () => {
//     console.log(`
//     Hauteur page : ${document.body.scrollHeight}
//     Hauteur affichage : ${innerHeight}
//     Scroll Position : ${scrollY}
//     isFixed : ${isFixed}
//     headerOffset : ${headerOffset}
//     searchOffset : ${search.offsetHeight}`);
// });

//FIN Script de sticky search bar
