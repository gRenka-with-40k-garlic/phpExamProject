<?php
session_start();

require_once '../db.php';

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: LoginPage.php');
    exit;
} ?>

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

    <h1>Welcome, <?= $_SESSION['user-login'] ?></h1>


    <form action="../services/CreateProduct.php" method="post">
        <!---отображение ошибки если такой продукт уже существует не работет, но бд новую запись не заносит -->
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
        ?>

        <input name="name" required type="text" placeholder="name">
        <input name="description" required type="text" placeholder="description">
        <input name="price" required type="number" placeholder="price">
        <button>Add</button>
    </form>


    <?php
    $query = mysqli_query($connect, "SELECT * FROM `products`");
    $products = mysqli_fetch_all($query);
    foreach ($products as $el) {
        ?>
        <div class="button-row">
            <form action="../services/DeleteProduct.php" method="post" style="display: inline-block;">
                <input type="hidden" name="id" value="<?= $el[0] ?>">
                <h1>name - <?= $el[1] ?></h1>
                <p>description - <?= $el[2] ?></p>
                <p>price - <?= $el[3] ?></p>
                <button>Delete</button>
            </form>

            <form action="UpdatePage.php" method="post" style="display: inline-block;">
                <input type="hidden" name="id" value="<?= $el[0] ?>">
                <button>Update</button>
            </form>
        </div>
        <?php
    } ?>

</section>
<footer>
    <p>&copy; 2024 Your Company</p>
</footer>
</body>
</html>