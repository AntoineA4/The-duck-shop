const burgerBtn = document.getElementById("burger-btn");
const nav = document.getElementById("main-nav");

burgerBtn.addEventListener("click", (e) => {
    e.stopPropagation(); // empêche le clic de se propager au document
    nav.classList.toggle("active");
});

document.addEventListener("click", (e) => {
    const isClickInsideNav = nav.contains(e.target);
    const isClickOnBurger = burgerBtn.contains(e.target);

    if (!isClickInsideNav && !isClickOnBurger) {
        nav.classList.remove("active");
    }
});