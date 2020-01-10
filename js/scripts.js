const menu_btn = document.querySelector(".menu__mobile");
const menu = document.querySelector(".header__menu");
const arrow = document.querySelector(".header__scroll--arrow");
const backdrop = document.querySelector(".header__menu");

let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

menu_btn.addEventListener('click', () => {
  menu.classList.toggle('showhide');
  arrow.classList.toggle('hide');
});

backdrop.addEventListener('click', () => {
  menu.classList.toggle('showhide');
  arrow.classList.toggle('hide');
});