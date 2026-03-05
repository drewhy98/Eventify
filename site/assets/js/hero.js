document.addEventListener("DOMContentLoaded", function() {

    const slides = document.querySelectorAll(".featured-slide");
    let currentIndex = 0;

    if (slides.length === 0) return;

    function showNextSlide() {
        slides[currentIndex].classList.remove("active");
        currentIndex = (currentIndex + 1) % slides.length;
        slides[currentIndex].classList.add("active");
    }

    setInterval(showNextSlide, 4000);
});
