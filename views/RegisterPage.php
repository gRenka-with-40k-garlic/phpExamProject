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
    <form action="../services/Register.php" method="post">
        <h1>Registration</h1>

        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
        ?>

        <input name="name" required type="text" placeholder="User name">
        <input name="login" required type="text" placeholder="User login">
        <input name="pass" required type="text" placeholder="Password">
        <input name="confirm-pass" required type="text" placeholder="Repeat password">

        <button>Register</button>
    </form>
</section>

<footer>
    <p>&copy; 2024 Your Company</p>
</footer>
</body>
</html>