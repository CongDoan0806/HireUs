document.querySelector(".heart-icon").addEventListener("click", function() {
    let icon = this.querySelector("i");
    icon.classList.toggle("fa-regular");
    icon.classList.toggle("fa-solid");
});