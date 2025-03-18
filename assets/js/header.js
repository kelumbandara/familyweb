let subMenu = document.getElementById("subMenu");

function toggleMenu() {
    subMenu.classList.toggle("open_menu");
}


document.addEventListener("DOMContentLoaded", () => {
    const nav = document.querySelector("nav"),
        sideBarOpen = document.querySelector(".sideBarOpen"),
        sidebarClose = document.querySelector(".sidebarClose"),
        menu = document.querySelector(".menu");

    if (sideBarOpen) {
        sideBarOpen.addEventListener("click", () => {
            nav.classList.add("active");
        });
    }

    if (sidebarClose) {
        sidebarClose.addEventListener("click", () => {
            nav.classList.remove("active");
        });
    }
});


const mainMenu = document.querySelector('.nav_bar');

window.addEventListener('scroll', () => {
    if (window.scrollY) { // Trigger after scrolling past 100vh
        mainMenu.classList.add('slidedown');
    } else {
        mainMenu.classList.remove('slidedown');
    }
});

