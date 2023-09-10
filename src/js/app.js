// script.js
const menuToggle = document.querySelector('#toggle-menu');
const menu = document.querySelector('#main-nav-wrap');

menuToggle.addEventListener('click', () => {
    menu.classList.toggle('active');
});