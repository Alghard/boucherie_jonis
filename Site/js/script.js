function isMobile() {
    const regex = /Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i;
    return regex.test(navigator.userAgent);
}
if (isMobile()) {
    console.log("Mobile device detected");
} else {
    console.log("Desktop device detected");
}
//DEBUT Script de sticky search bar

const search = document.querySelector("#search-bar");
const header = document.querySelector("header");
const headerOffset = header.offsetHeight;
const blank = document.querySelector("#blank");
let isFixed = false; // Variable pour suivre si la barre est fixe
function scrolledSearchBar() {
    // Condition modifiée pour déclencher le changement de classe dès que l'en-tête disparaît de l'écran
    if (scrollY >= headerOffset && !isFixed) {
        search.classList.add("fixed");
        search.classList.remove("original");
        blank.style.height = "47px";
        isFixed = true;
    } else if (scrollY < headerOffset && isFixed) {
        search.classList.add("original");
        search.classList.remove("fixed");
        blank.style.height = "";
        isFixed = false;
    }
}
addEventListener("ontouchmove", scrolledSearchBar); //For mobile
addEventListener("scroll", scrolledSearchBar); //For computer
addEventListener("scroll", () => {
    console.log(`
    Largeur écran ? : ${innerWidth}`);
});

//FIN Script de sticky search bar

//DEBUT Script changement source logo
//Changement de la source de mon logo a partir d'une certaine taille d'écran avec matchMedia

let widthMatch = window.matchMedia("(max-width: 776px)"); //Fonctionne comme les mediaQueries en css
const logoFooter = document.querySelector("#logo-footer"); //Je recupere mon logo du footer
const logoHeader = document.querySelector("#logo-header"); //Je récupère mon logo du header
widthMatch.addEventListener("change", function (mm) {
    //Je place un event listener sur mon MQ qui réagit au changement de taille
    if (mm.matches) {
        //Si la largeur max de mon ecran est inférieure ou égale a mon MQ je met cette src
        logoFooter.src = "logo/logo_jonis_mini.png";
        logoHeader.src = "logo/logo_jonis_mini.png";
    } else {
        logoFooter.src = "logo/logo_jonis.png"; //Sinon je mets l'autre src
        logoHeader.src = "logo/logo_jonis.png";
    }
});
let widthWindow = window.innerWidth;
window.addEventListener("load", function () {
    //Je place un event listener sur mon MQ qui réagit au changement de taille
    if (widthWindow < 776) {
        //Si la largeur max de mon ecran est inférieure ou égale a mon MQ je met cette src
        logoFooter.src = "logo/logo_jonis_mini.png";
        logoHeader.src = "logo/logo_jonis_mini.png";
    } else {
        logoFooter.src = "logo/logo_jonis.png"; //Sinon je mets l'autre src
        logoHeader.src = "logo/logo_jonis.png";
    }
});

//FIN script changement source logo
console.log(widthMatch);

let number = document.querySelector('#qty')

function inc(element) {
    let el = document.querySelector(`[name="${element}"]`);
    el.value = parseInt(el.value) + 1;
}

function dec(element) {
    let el = document.querySelector(`[name="${element}"]`);
    if (parseInt(el.value) > 1) {
        el.value = parseInt(el.value) - 1;
    }
}