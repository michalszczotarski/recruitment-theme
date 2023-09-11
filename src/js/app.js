// script.js
import Splide from '@splidejs/splide';

const menuToggle = document.querySelector('#toggle-menu');
const menu = document.querySelector('#main-nav-wrap');
let isTablet = false;

var splide = new Splide( '.splide-tiles', {
    autoplay: true
} );
var testimonial = new Splide( '.splide-testimonial', {
    autoplay: true,
    arrows: false
} );
testimonial.mount();

handleScreenWidthChange();
function handleScreenWidthChange() {
    if (!isTablet && window.matchMedia('screen and (max-width: 999px)').matches) {
        isTablet = true;
        splide.mount();
    } else if( isTablet && window.matchMedia('screen and (min-width: 1000px)').matches) {
        isTablet = false;
        splide.destroy();
    }
}

window.addEventListener('resize', handleScreenWidthChange);

menuToggle.addEventListener('click', () => {
    menu.classList.toggle('active');
    document.body.classList.toggle('active-menu');
});