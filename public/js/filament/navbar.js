// public/js/navbar.js
document.addEventListener("DOMContentLoaded", function () {
    const burgerIcon = document.getElementById("burger-icon");
    const navLinks = document.querySelector(".md\\:hidden");

    burgerIcon.addEventListener("click", function () {
        navLinks.classList.toggle("hidden");
    });
});
