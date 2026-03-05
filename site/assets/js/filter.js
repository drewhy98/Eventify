document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("searchInput");
    const locationFilter = document.getElementById("locationFilter");
    const priceFilter = document.getElementById("priceFilter");
    const cards = document.querySelectorAll(".event-card");

    function filterEvents() {

        const searchValue = searchInput.value.toLowerCase();
        const locationValue = locationFilter.value.toLowerCase();
        const priceValue = priceFilter.value;

        cards.forEach(card => {

            const title = card.dataset.title;
            const location = card.dataset.location;
            const price = parseFloat(card.dataset.price);

            let matchesSearch = title.includes(searchValue) || location.includes(searchValue);
            let matchesLocation = locationValue === "" || location === locationValue;
            let matchesPrice = priceValue === "" || price <= parseFloat(priceValue);

            if (matchesSearch && matchesLocation && matchesPrice) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });
    }

    searchInput.addEventListener("input", filterEvents);
    locationFilter.addEventListener("change", filterEvents);
    priceFilter.addEventListener("change", filterEvents);

});
