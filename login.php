<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($email) || empty($password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        $success = "Login Successful! Welcome back.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CCE Skills Clinic – Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="container">

    <!-- LEFT: Yellow form panel -->
    <div class="yellow-panel clip-right">
        <div class="logo-area">
            <img src="logo.png" alt="CCE Skills Clinic Logo" class="logo-img"/>
            <div class="logo-text">CCE<br>SKILLS CLINIC</div>
        </div>

        <h1>Login</h1>

        <?php if ($error): ?>
            <div class="msg error"><?= htmlspecialchars($error) ?></div>
        <?php elseif ($success): ?>
            <div class="msg success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email"
                       placeholder="you@example.com"
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••"/>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>

    <!-- RIGHT: Dark navigation panel -->
    <div class="dark-panel side-right">
        <p>Don't have an account?</p>
        <a href="register.php">Register Here</a>
    </div>

</div>
</body>
</html>
