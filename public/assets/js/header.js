document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const mobileMenuWrapper = document.querySelector(".mobile-menu-wrapper");

    menuToggle.addEventListener("click", function (event) {
        mobileMenuWrapper.classList.toggle("show-menu");
        event.stopPropagation();
    });

    document.addEventListener("click", function (event) {
        if (!mobileMenuWrapper.contains(event.target) && !menuToggle.contains(event.target)) {
            mobileMenuWrapper.classList.remove("show-menu");
        }
    });
});






