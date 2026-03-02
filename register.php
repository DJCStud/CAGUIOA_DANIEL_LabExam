<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = trim($_POST["email"]    ?? "");
    $name     = trim($_POST["name"]     ?? "");
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($email) || empty($name) || empty($username) || empty($password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($username) < 3) {
        $error = "Username must be at least 3 characters.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $success = "Registration Successful! You may now log in.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CCE Skills Clinic – Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="container">

    <!-- LEFT: Dark navigation panel -->
    <div class="dark-panel side-left">
        <p>Already have an account?</p>
        <a href="login.php">Login Here</a>
    </div>

    <!-- RIGHT: Yellow form panel -->
    <div class="yellow-panel clip-left">
        <div class="logo-area align-right">
            <div class="logo-text text-right">CCE<br>SKILLS CLINIC</div>
            <img src="logo.png" alt="CCE Skills Clinic Logo" class="logo-img"/>
        </div>

        <h1>Register</h1>

        <form method="POST" action="">
            <div class="form-row">

                <?php if ($error): ?>
                    <div class="msg error"><?= htmlspecialchars($error) ?></div>
                <?php elseif ($success): ?>
                    <div class="msg success"><?= htmlspecialchars($success) ?></div>
                <?php endif; ?>

                <div class="form-group full">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email"
                           placeholder="you@example.com"
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"/>
                </div>

                <div class="form-group full">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name"
                           placeholder="Juan Dela Cruz"
                           value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"/>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"
                           placeholder="juandc"
                           value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"/>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••"/>
                </div>

            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

</div>
</body>
</html>
