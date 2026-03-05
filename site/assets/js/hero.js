/*
    Homepage hero slideshow
    Cycles through slides every 4 seconds
*/

document.addEventListener("DOMContentLoaded", function() {

    const slides = document.querySelectorAll(".hero-slide");
    let currentIndex = 0;

    if (slides.length === 0) return;

    function showNextSlide() {

        // Remove active class
        slides[currentIndex].classList.remove("active");

        // Move to next slide
        currentIndex = (currentIndex + 1) % slides.length;

        // Add active class to new slide
        slides[currentIndex].classList.add("active");
    }

    // Change slide every 4 seconds
    setInterval(showNextSlide, 4000);

});
