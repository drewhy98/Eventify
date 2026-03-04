// ==============================
// Index Page Slideshow Script
// Rotates slides automatically
// ==============================

document.addEventListener("DOMContentLoaded", function() {

    // Select all slides in the index slideshow
    const slides = document.querySelectorAll(".index-slideshow .slide");
    let currentIndex = 0;

    // Stop if no slides
    if (slides.length === 0) return;

    // Show the next slide in loop
    function showNextSlide() {
        slides[currentIndex].classList.remove("active");       // hide current
        currentIndex = (currentIndex + 1) % slides.length;    // move to next (loop)
        slides[currentIndex].classList.add("active");         // show new
    }

    // Change slide every 4 seconds
    setInterval(showNextSlide, 4000);
});
