var menu_btn = document.querySelector(".menu__mobile");
var menu = document.querySelector(".header__menu");
var arrow = document.querySelector(".header__scroll--arrow");
var backdrop = document.querySelector(".header__menu");
var vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', vh + "px");
menu_btn.addEventListener('click', function () {
    menu.classList.toggle('showhide');
    arrow.classList.toggle('hide');
});
backdrop.addEventListener('click', function () {
    menu.classList.toggle('showhide');
    arrow.classList.toggle('hide');
});
