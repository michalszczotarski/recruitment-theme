// script.js
import Splide from '@splidejs/splide';

const menuToggle = document.querySelector('#toggle-menu');
const menu = document.querySelector('#main-nav-wrap');

menuToggle.addEventListener('click', () => {
    menu.classList.toggle('active');
});

var splide = new Splide( '.splide-tiles', {
    autoplay: true
} );

let isTablet = false;

// Funkcja do obsługi zmiany szerokości ekranu
function handleScreenWidthChange() {

    if (!isTablet && window.matchMedia('screen and (max-width: 999px)').matches) {
        isTablet = true;
        splide.mount();
    } else if( isTablet && window.matchMedia('screen and (min-width: 1000px)').matches) {
        isTablet = false;
        splide.destroy();
    }

}

// Wywołujemy funkcję po załadowaniu strony
handleScreenWidthChange();

// Dodajemy obsługę zdarzenia resize (zmiany rozmiaru okna)
window.addEventListener('resize', handleScreenWidthChange);