<?php
session_start();
include_once "includes/dbconnect.php";

/*
    Fetch the latest 4 events from the database.
    use image_url + title for the slideshow.
*/
$stmt = $db->query("
    SELECT title, image_url 
    FROM events 
    WHERE image_url IS NOT NULL 
    ORDER BY event_date DESC 
    LIMIT 4
");

$events = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<!-- Page-specific CSS -->
<link rel="stylesheet" href="assets/css/about.css">

<section class="about-section">

    <div class="about-container">

        <!-- LEFT SIDE: Dynamic Slideshow -->
        <div class="about-image">
            <div class="slideshow">

                <?php
                /*
                    Loop through database results
                    Each image becomes a slide
                    First image gets class "active"
                */
                if ($events):
                    $first = true;
                    foreach ($events as $event):
                ?>

                    <img 
                        class="slide <?= $first ? 'active' : '' ?>" 
                        src="<?= htmlspecialchars($event['image_url']); ?>" 
                        alt="<?= htmlspecialchars($event['title']); ?>"
                    >

                <?php
                        $first = false;
                    endforeach;
                else:
                    echo "<p>No images available.</p>";
                endif;
                ?>

            </div>
        </div>

        <!-- RIGHT SIDE: About Text -->
        <div class="about-content">
            <h1>About Eventify</h1>
            <p>
                Eventify connects fans with unforgettable live experiences.
                From concerts to festivals, we make discovering and booking
                events simple and exciting.
            </p>

            <p>
                Our platform updates dynamically with the latest events,
                so there's always something new to discover.
            </p>

            <a href="view_events.php">
                <button class="about-btn">Explore Events</button>
            </a>
        </div>

    </div>

</section>

<!-- Page-specific JavaScript -->
<script src="assets/js/about.js"></script>

<?php include 'includes/footer.php'; ?>
