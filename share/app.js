$.select("aside.menu", "menu");
$.select("#prevent", "prevent");

function closeMenu () {
    $.menu.style.left = "-260px";
    $.body.style.overflow = "visible";
    $.prevent.style.zIndex = "-1";
}

function openMenu () {
    $.menu.style.left = 0;
    $.body.style.overflow = "hidden";
    $.prevent.style.zIndex = "2";
}

$.prevent.event("click", closeMenu);
$.select("header nav .open").event("click", openMenu);