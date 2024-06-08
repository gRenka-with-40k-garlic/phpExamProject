<?php
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';

    $query = "SELECT COUNT(*) FROM products WHERE name = ? AND description = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $name, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($count > 0) {
        $_SESSION['error_message'] = 'Product already exists.';
        header('Location: ../views/AccountPage.php');
        exit;
    }

    $query = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'ssd', $name, $description, $price);
    $result = mysqli_stmt_execute($stmt);
    $stmt->close();

    if ($result) {
        header('Location: /views/AccountPage.php');
    } else {
        echo "Error: " . mysqli_error($connect);
    }
    exit;
}
