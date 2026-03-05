<?php
session_start();
include_once "includes/dbconnect.php";

/*
    Fetch all events
*/
$stmt = $db->query("
    SELECT title, image_url
    FROM events
    WHERE image_url IS NOT NULL
    ORDER BY event_date DESC
    --LIMIT 4
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

            <!-- Entire slide is clickable -->
            <a href="view_events.php" 
               class="featured-slide <?= $first ? 'active' : '' ?>">

                <img src="<?= htmlspecialchars($event['image_url']); ?>"
                     alt="<?= htmlspecialchars($event['title']); ?>">

            </a>

        <?php
                $first = false;
            endforeach;
        else:
            echo "<p>No featured events available.</p>";
        endif;
        ?>

    </div>

</section>

<script src="assets/js/index_slideshow.js"></script>

<?php include 'includes/footer.php'; ?>
