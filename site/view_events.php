<?php
session_start();
include_once "includes/dbconnect.php";
?>

<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/events.css">

<h2 class="page-title">Upcoming Events</h2>

<div class="events-page">
    <div class="events-grid">

        <?php
        $stmt = $db->query("SELECT * FROM events ORDER BY event_date ASC");
        $events = $stmt->fetchAll();

        if ($events):
            foreach ($events as $event):
        ?>

            <div class="event-card">
            <img src="<?= htmlspecialchars($event['image_url']); ?>" 
             alt="<?= htmlspecialchars($event['title']); ?>">

                <h3><?= htmlspecialchars($event['title']); ?></h3>
                <p class="event-place"><?= htmlspecialchars($event['place']); ?></p>
                <p class="event-date"><?= date("F j, Y", strtotime($event['event_date'])); ?></p>
                <p class="event-price">£<?= number_format($event['price'], 2); ?></p>

                <form method="post" action="buy_ticket.php">
                    <input type="hidden" name="event_id" value="<?= $event['id']; ?>">
                    <button class="btn">Buy Ticket</button>
                </form>
            </div>

        <?php
            endforeach;
        else:
            echo "<p>No events available.</p>";
        endif;
        ?>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
