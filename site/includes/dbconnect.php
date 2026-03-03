<?php
// Only start session if it hasn't started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ---------- DATABASE CONNECTION ---------- */
$host = "localhost";
$dbname = "eventify_db";   // Change to your DB name
$username = "root";        // Change to your DB username
$password = "";            // Change to your DB password

try {
    $db = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
