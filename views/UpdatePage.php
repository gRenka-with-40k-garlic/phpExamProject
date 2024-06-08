<?php
session_start();
require_once '../db.php';

$id = $_POST['id'];

$stmt = $connect->prepare("SELECT * FROM `products` WHERE `id` = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
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

            <form method="post">
                <button type="submit" name="logout" class="header-button">Logout</button>
            </form>
        </nav>
    </header>

    <section>
        <form action="../services/UpdateProduct.php" method="post">
            <h1>Update product data</h1>
            <input style="display: none;" name="id" value="<?= $product['id'] ?>" type="text">
            <input value="<?= $product['name'] ?>" name="name" type="text" required>
            <input value="<?= $product['description'] ?>" name="description" type="text" required>
            <input value="<?= $product['price'] ?>" name="price" type="text" required>
            <button>Update</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Your Company</p>
    </footer>
    </body>
    </html>

    <?php
} else {
    echo 'Product not found';
} ?>