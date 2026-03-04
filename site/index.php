<?php
session_start();
include_once "includes/dbconnect.php";
include 'includes/header.php';

// Fetch latest 4 events for index slideshow
$stmt = $db->query("
    SELECT title, image_url 
    FROM events 
    WHERE image_url IS NOT NULL 
    ORDER BY event_date DESC 
    LIMIT 4
");
$indexEvents = $stmt->fetchAll();
?>

<section class="index-slideshow">
    <h2>Featured This Month</h2>

    <div class="slideshow">
        <?php
        if ($indexEvents):
            $first = true;
            foreach ($indexEvents as $event):
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
            echo "<p>No featured events available.</p>";
        endif;
        ?>
    </div>
</section>

<!-- Include external JS for slideshow -->
<script src="includes/assets/js/slideshow_index.js"></script>

<?php
include 'includes/footer.php';
?>
