<?php
session_start();
include_once "includes/dbconnect.php";

$stmt = $db->query("
    SELECT id, title, location, event_date, price, image_url 
    FROM events 
    ORDER BY event_date ASC
");

$events = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<section class="events-page">

    <h2 class="page-title">All Events</h2>

    <!-- ===================== -->
    <!-- SEARCH + FILTER BAR   -->
    <!-- ===================== -->
    <div class="filter-bar">

        <input type="text" id="searchInput" placeholder="Search events...">

        <select id="locationFilter">
            <option value="">All Locations</option>
            <?php
            $locations = array_unique(array_column($events, 'location'));
            foreach ($locations as $loc):
            ?>
                <option value="<?= htmlspecialchars($loc); ?>">
                    <?= htmlspecialchars($loc); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select id="priceFilter">
            <option value="">Any Price</option>
            <option value="25">Under £25</option>
            <option value="50">Under £50</option>
            <option value="100">Under £100</option>
        </select>

    </div>


    <!-- ===================== -->
    <!-- EVENTS GRID           -->
    <!-- ===================== -->

    <div class="events-grid" id="eventsGrid">

        <?php foreach ($events as $event): ?>
            <div class="event-card"
                 data-title="<?= strtolower(htmlspecialchars($event['title'])); ?>"
                 data-location="<?= strtolower(htmlspecialchars($event['location'])); ?>"
                 data-price="<?= $event['price']; ?>">

                <img src="<?= htmlspecialchars($event['image_url']); ?>"
                     alt="<?= htmlspecialchars($event['title']); ?>">

                <h3><?= htmlspecialchars($event['title']); ?></h3>
                <p><?= htmlspecialchars($event['location']); ?></p>
                <p><?= date("d M Y", strtotime($event['event_date'])); ?></p>
                <p>£<?= number_format($event['price'], 2); ?></p>

                <button class="btn">Buy Ticket</button>
            </div>
        <?php endforeach; ?>

    </div>

</section>

<script src="assets/js/filter.js"></script>

<?php include 'includes/footer.php'; ?>
