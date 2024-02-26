//DEBUT Script de sticky search bar

const search = document.querySelector("#search-bar");
const header = document.querySelector("header");
const headerOffset = header.offsetHeight;
let isFixed = false; // Variable pour suivre si la barre est fixe
function scrolledSearchBar() {
    // Condition modifiée pour déclencher le changement de classe dès que l'en-tête disparaît de l'écran
    if (scrollY >= (headerOffset-50) && !isFixed) {
        search.classList.add("fixed");
        search.classList.remove("original");
        isFixed = true;
    } else if (scrollY < (headerOffset-50) && isFixed) {
        search.classList.add("original");
        search.classList.remove("fixed");
        isFixed = false;
    }
}
addEventListener("ontouchmove", scrolledSearchBar); //For mobile
addEventListener("scroll", scrolledSearchBar); //For computer
addEventListener("scroll", () => {
    console.log(`
    Largeur écran ? : ${innerWidth}`)
});

//FIN Script de sticky search bar


//DEBUT Script changement source logo
//Changement de la source de mon logo a partir d'une certaine taille d'écran avec matchMedia

let widthMatch = window.matchMedia("(max-width: 776px)");       //Fonctionne comme les mediaQueries en css
const logoFooter = document.querySelector("#logo-footer");      //Je recupere mon logo du footer
const logoHeader = document.querySelector("#logo-header");      //Je récupère mon logo du header
widthMatch.addEventListener('change', function(mm) {            //Je place un event listener sur mon MQ qui réagit au changement de taille
    if (mm.matches) {                                           //Si la largeur max de mon ecran est inférieure ou égale a mon MQ je met cette src 
        logoFooter.src = "logo/logo_jonis_mini.png";
        logoHeader.src = "logo/logo_jonis_mini.png";
    }
    else {
        logoFooter.src = "logo/logo_jonis.png";                 //Sinon je mets l'autre src
        logoHeader.src = "logo/logo_jonis.png";
    }
});