// ==============================
// Index Slideshow JS
// Rotates slides automatically
// ==============================
document.addEventListener("DOMContentLoaded", function() {

    // Select all slides in the index slideshow
    const slides = document.querySelectorAll(".index-slideshow .slide");
    let currentIndex = 0;

    // Stop if no slides found
    if (!slides || slides.length === 0) return;

    // Function to show next slide
    function showNextSlide() {
        slides[currentIndex].classList.remove("active");        // hide current slide
        currentIndex = (currentIndex + 1) % slides.length;     // next index
        slides[currentIndex].classList.add("active");          // show next slide
    }

    // Start slideshow: change every 4 seconds
    setInterval(showNextSlide, 4000);
});
