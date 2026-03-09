<?php
session_start();
include_once "includes/dbconnect.php";
include 'includes/header.php';
?>

<link rel="stylesheet" href="assets/css/add_event.css">

<div class="form-container">

<h2 class="page-title">Add New Event</h2>

<form method="post" action="insert_event.php" class="event-form">

<label for="event_type">Event Type</label>
<select name="event_type" id="event_type" required>
<option value="">Select type</option>
<option value="Concert">Concert</option>
<option value="Festival">Festival</option>
<option value="Comedy">Comedy</option>
<option value="Sports">Sports</option>
<option value="Theatre">Theatre</option>
</select>

<label for="title">Title</label>
<input type="text" name="title" id="title" required>

<label for="place">Place</label>
<input type="text" name="place" id="place" required>

<label for="event_date">Event Date</label>
<input type="date" name="event_date" id="event_date" required>

<label for="image_url">Image URL</label>
<input type="text" name="image_url" id="image_url">

<label for="price">Price (£)</label>
<input type="number" name="price" id="price" step="0.01" required>

<button type="submit" class="btn-submit">Add Event</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>
