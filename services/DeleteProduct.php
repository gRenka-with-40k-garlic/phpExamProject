<?php
require_once '../db.php';

$id = $_POST['id'];

$stmt = $connect->prepare("DELETE FROM `products` WHERE `id` = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->errno) {
    echo "Error: " . $stmt->error;
} else {
    header('Location: ../views/AccountPage.php');
}
$stmt->close();