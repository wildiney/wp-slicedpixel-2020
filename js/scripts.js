const menu_btn = document.querySelector(".menu__mobile");
const menu = document.querySelector(".header__menu");
const arrow = document.querySelector(".header__scroll--arrow");

menu_btn.addEventListener('click', () => {
  menu.classList.toggle('showhide');
  arrow.classList.toggle('hide');
});