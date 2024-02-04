const search = document.querySelector("#search-bar");
const header = document.querySelector("header");
let isFixed = false; // Variable pour suivre si la barre est fixe
function scrolled() {
    const windowHeight = window.innerHeight;
    const currentScroll = document.body.scrollTop || document.documentElement.scrollTop;

    // Récupérer la position de l'en-tête par rapport au haut de la page
    const searchTop = search.getBoundingClientRect().top;

    // Condition modifiée pour déclencher le changement de classe dès que l'en-tête disparaît de l'écran
    if (searchTop <= 0 && !isFixed ){
		search.classList.add("fixed");
		search.classList.remove("original");
		isFixed = true
	} else if (currentScroll > 3 && isFixed){
		search.classList.remove("fixed");
		search.classList.add("original");
		isFixed = false;
	}
}
addEventListener("scroll", scrolled, false);