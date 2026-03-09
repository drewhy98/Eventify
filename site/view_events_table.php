//jquery inbuilt table https://datatables.net/

<?php
session_start();
include_once "includes/dbconnect.php";
?>

<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<h2 class="page-title">Events Table</h2>

<div class="table-container">

<table id="eventsTable" class="display">
<thead>
<tr>
    <th>Title</th>
    <th>Location</th>
    <th>Date</th>
    <th>Price</th>
</tr>
</thead>

<tbody>

<?php
$stmt = $db->query("SELECT * FROM events ORDER BY event_date ASC");
$events = $stmt->fetchAll();

foreach ($events as $event):
?>

<tr>

<td><?= htmlspecialchars($event['title']); ?></td>

<td><?= htmlspecialchars($event['place']); ?></td>

<td><?= date("F j, Y", strtotime($event['event_date'])); ?></td>

<td>£<?= number_format($event['price'], 2); ?></td>

</tr>

<?php endforeach; ?>

</tbody>
</table>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#eventsTable').DataTable({
        pageLength: 10,
        order: [[2, "asc"]] // sort by date
    });
});
</script>

<?php include 'includes/footer.php'; ?>
