<?php
require_once '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$stmt = $connect->prepare("UPDATE `products` SET `name`=?, `description`=?, `price`=? WHERE `id`=?");
$stmt->bind_param("ssdi", $name, $description, $price, $id);

if ($stmt->execute()) {
    header('Location: ../views/AccountPage.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();