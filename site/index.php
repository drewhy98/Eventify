<?php
session_start();
include_once "includes/dbconnect.php";

/*
    Fetch latest 3 events for featured section
*/
$stmt = $db->query("
    SELECT title, image_url 
    FROM events 
    WHERE image_url IS NOT NULL
    ORDER BY event_date DESC
    LIMIT 3
");

$events = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<section class="featured-section">

    <h2 class="featured-title">Featured This Month</h2>

    <div class="featured-slideshow">

        <?php
        if ($events):
            $first = true;
            foreach ($events as $event):
        ?>

            <div class="featured-slide <?= $first ? 'active' : '' ?>">
                <img src="<?= htmlspecialchars($event['image_url']); ?>"
                     alt="<?= htmlspecialchars($event['title']); ?>">

                <div class="featured-overlay">
                    <h3><?= htmlspecialchars($event['title']); ?></h3>
                    <a href="view_events.php" class="featured-btn">View Event</a>
                </div>
            </div>

        <?php
                $first = false;
            endforeach;
        else:
            echo "<p>No featured events available.</p>";
        endif;
        ?>

    </div>

</section>

<script src="assets/js/hero.js"></script>

<?php include 'includes/footer.php'; ?>
