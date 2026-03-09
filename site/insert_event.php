<?php
session_start();
include_once "includes/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$event_type = $_POST['event_type'];
$title = $_POST['title'];
$place = $_POST['place'];
$event_date = $_POST['event_date'];
$image_url = $_POST['image_url'];
$price = $_POST['price'];

$sql = "INSERT INTO events 
(event_type, title, place, event_date, image_url, price)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);
$stmt->execute([
$event_type,
$title,
$place,
$event_date,
$image_url,
$price
]);

header("Location: events.php");
exit();
}
?>
