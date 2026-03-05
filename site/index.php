<?php
session_start();
include_once "includes/dbconnect.php";

/*
    Fetch latest 3 events for homepage hero slideshow
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

<!-- Hero Section -->
<section class="hero">

    <div class="hero-slideshow">

        <?php
        /*
            Loop through database results
            First image gets class 'active'
        */
        if ($events):
            $first = true;
            foreach ($events as $event):
        ?>

            <div class="hero-slide <?= $first ? 'active' : '' ?>">
                <img src="<?= htmlspecialchars($event['image_url']); ?>" 
                     alt="<?= htmlspecialchars($event['title']); ?>">

                <!-- Optional text overlay -->
                <div class="hero-overlay">
                    <h1><?= htmlspecialchars($event['title']); ?></h1>
                    <a href="view_events.php" class="hero-btn">Explore Events</a>
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
