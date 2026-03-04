// ==============================
// Index Slideshow JS
// Rotates slides automatically
// ==============================
document.addEventListener("DOMContentLoaded", function() {

    // Select only slides inside index-slideshow
    const slides = document.querySelectorAll(".index-slideshow .slide");
    if (!slides || slides.length === 0) return;

    let currentIndex = 0;

    // Show next slide every 4 seconds
    setInterval(() => {
        slides[currentIndex].classList.remove("active");
        currentIndex = (currentIndex + 1) % slides.length;
        slides[currentIndex].classList.add("active");
    }, 4000);
});
