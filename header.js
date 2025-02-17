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