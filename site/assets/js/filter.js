document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("searchInput");
    const placeFilter = document.getElementById("placeFilter");
    const priceFilter = document.getElementById("priceFilter");
    const cards = document.querySelectorAll(".event-card");

    function filterEvents() {

        const searchValue = searchInput.value.toLowerCase();
        const placeValue = placeFilter.value;
        const priceValue = priceFilter.value;

        cards.forEach(card => {

            const title = card.dataset.title;
            const place = card.dataset.place;
            const price = parseFloat(card.dataset.price);

            let matchesSearch =
                title.includes(searchValue) ||
                place.includes(searchValue);

            let matchesPlace =
                placeValue === "" ||
                place === placeValue;

            let matchesPrice =
                priceValue === "" ||
                price <= parseFloat(priceValue);

            if (matchesSearch && matchesPlace && matchesPrice) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });
    }

    searchInput.addEventListener("input", filterEvents);
    placeFilter.addEventListener("change", filterEvents);
    priceFilter.addEventListener("change", filterEvents);

});
