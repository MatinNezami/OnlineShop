$.select("aside.menu", "menu");
$.select("#prevent", "prevent");
$.select("#message", "message");
$.select("#message p", "messageText");
$.select(".back-to-top", "back");

const renderMenu = _ => location.get("menu") && innerWidth <= 532? openMenu(): closeMenu();

function closeMenu () {
    console.log("close");
    $.menu.style.left = "-260px";
    $.body.style.overflow = "visible";
    $.prevent.style.zIndex = "-1";

    history.replaceState(null, "", location.remove("menu"));
}

function openMenu (load) {
    $.menu.style.left = 0;
    $.body.style.overflow = "hidden";
    $.prevent.style.zIndex = "2";



    // if (!load) history.replaceState(null, "", location.search)
    if (!load) return;

    history.pushState(null, "",
        location.get("menu")? location.search: location.append({menu: "open"})
    );
}

renderMenu(true);
window.addEventListener("popstate", renderMenu);

$.prevent.event("click", closeMenu);
$.select("header nav .open").event("click", openMenu);


$.back.event("click", _ => scrollTo(0, 0));

window.addEventListener("scroll",
    _ => $.back.style.display = scrollY >= 130? "flex": "none"
);


function message (message) {
    if(!$.message)
        return null;

    if (!$.message.classList.contains("active")) {
        $.messageText.innerText = message;
        $.message.classList.add("active");
    }

    setTimeout (_ => {
        $.message.classList.remove("active");
    }, 3200);
}