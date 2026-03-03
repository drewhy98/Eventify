<?php
session_start();
include_once "includes/dbconnect.php";

$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Validation
    if (empty($name)) $nameErr = "Name is required";
    if (empty($email)) $emailErr = "Email is required";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Invalid email format";
    if (empty($password)) $passwordErr = "Password is required";
    elseif (strlen($password) < 6) $passwordErr = "Password must be at least 6 characters";

    // If no errors, insert into DB
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashed_password
            ]);
            $successMsg = "Registration successful!";
            $name = $email = $password = "";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // duplicate email
                $emailErr = "Email already exists!";
            } else {
                die("Database error: " . $e->getMessage());
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Eventify Signup</title>
<link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>

<div class="form-container">
    <h2>Register</h2>
    <p><span class="error">* required field</span></p>

    <?php if (isset($successMsg)) echo "<p style='color:green;'>$successMsg</p>"; ?>

    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
        <span class="error">* <?= $nameErr ?></span>

        <label>Email:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
        <span class="error">* <?= $emailErr ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error">* <?= $passwordErr ?></span>

        <br><br>
        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
