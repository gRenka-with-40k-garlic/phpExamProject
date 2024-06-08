<?php
session_start();
require_once '../db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>///</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
<header>
    <nav style="display: flex; justify-content: center;">
        <a href="../views/RegisterPage.php" class="header-button">Register</a>
        <a href="../views/LoginPage.php" class="header-button">Login</a>
        <a href="../views/AccountPage.php" class="header-button">Account</a>
    </nav>
</header>

<section>
    <form action="../services/Login.php/" method="post">
        <h1>Login</h1>
        <input name="login" type="text" placeholder="User login" required>
        <input name="pass" type="text" placeholder="Password" required>
        <button>Login</button>
    </form>

</section>

<footer>
    <p>&copy; 2024 Your Company</p>
</footer>
</body>
</html>