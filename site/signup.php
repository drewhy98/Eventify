<?php
session_start();
include_once "includes/dbconnect.php";

$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($name)) $nameErr = "Name is required";
    if (empty($email)) $emailErr = "Email is required";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Invalid email format";
    if (empty($password)) $passwordErr = "Password is required";
    elseif (strlen($password) < 6) $passwordErr = "Password must be at least 6 characters";

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
            if ($e->getCode() == 23000) {
                $emailErr = "Email already exists!";
            } else {
                die("Database error: " . $e->getMessage());
            }
        }
    }
}
?>

<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/signup.css">

<div class="signup-form">
    <h2>Register</h2>
    <p><span class="error">* required field</span></p>

    <?php if (isset($successMsg)) echo "<p class='success-msg'>$successMsg</p>"; ?>

    <form method="post">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required>
            <span class="error"><?= $nameErr ?></span>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            <span class="error"><?= $emailErr ?></span>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required>
            <span class="error"><?= $passwordErr ?></span>
        </div>

        <input type="submit" class="btn" value="Register">
    </form>

    <div class="links">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        <p><a href="index.php">Back to Home</a></p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
