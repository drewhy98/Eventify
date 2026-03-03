<?php
session_start();
include_once "includes/dbconnect.php";

$emailErr = $passwordErr = $loginErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Validation
    if (empty($email)) $emailErr = "Email is required";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Invalid email format";

    if (empty($password)) $passwordErr = "Password is required";

    // If no errors, check DB
    if (empty($emailErr) && empty($passwordErr)) {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];
            header("Location:index.php");
            exit();
        } else {
            $loginErr = "Incorrect email or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Eventify Login</title>
<link rel="stylesheet" href="../assets/css/style.css"> <!-- site-wide -->
<link rel="stylesheet" href="../assets/css/login.css"> <!-- form-specific -->
</head>
<body>

<div class="login-form">
    <h2>Login</h2>
    <p><span class="error">* required field</span></p>

    <?php if (!empty($loginErr)) echo "<p class='error'>$loginErr</p>"; ?>

    <form method="post" action="">
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            <span class="error">* <?= $emailErr ?></span>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required>
            <span class="error">* <?= $passwordErr ?></span>
        </div>

        <input type="submit" class="btn" value="Login">
    </form>

    <div class="links">
        <p>Don’t have an account? <a href="signup.php">Register here</a></p>
        <p><a href="../index.php">Back to Home</a></p>
    </div>
</div>

</body>
</html>
