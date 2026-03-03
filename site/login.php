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
            // Successful login
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];
            header("Location:index.php"); // redirect to homepage
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
<link rel="stylesheet" href=".../assets/css/login.css">
</head>
<body>

<div class="form-container">
    <h2>Login</h2>
    <p><span class="error">* required field</span></p>

    <?php if (!empty($loginErr)) echo "<p class='error'>$loginErr</p>"; ?>

    <form method="post" action="">
        <label>Email:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
        <span class="error">* <?= $emailErr ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error">* <?= $passwordErr ?></span>

        <br><br>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
