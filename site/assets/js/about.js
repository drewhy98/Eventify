document.addEventListener("DOMContentLoaded", function() {

    const image = document.querySelector(".about-image");
    const content = document.querySelector(".about-content");

    function revealOnScroll() {
        const trigger = window.innerHeight * 0.8;

        if (image.getBoundingClientRect().top < trigger) {
            image.classList.add("show");
        }

        if (content.getBoundingClientRect().top < trigger) {
            content.classList.add("show");
        }
    }

    window.addEventListener("scroll", revealOnScroll);
    revealOnScroll();
});
