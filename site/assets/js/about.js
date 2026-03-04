/*
    Simple automatic slideshow
    - Select all slides
    - Remove "active" from current
    - Add "active" to next
    - Loop forever
*/

document.addEventListener("DOMContentLoaded", function() {

    const slides = document.querySelectorAll(".slide");
    let currentIndex = 0;

    // If there are no slides, stop script
    if (slides.length === 0) return;

    function showNextSlide() {

        // Remove active class from current slide
        slides[currentIndex].classList.remove("active");

        // Move to next slide (loop back to 0 at end)
        currentIndex = (currentIndex + 1) % slides.length;

        // Add active class to new slide
        slides[currentIndex].classList.add("active");
    }

    // Change slide every 4 seconds
    setInterval(showNextSlide, 4000);

});
