<?php
session_start();
require_once '../db.php';


$login = $_POST['login'] ?? '';
$pass = $_POST['pass'] ?? '';

$query = $connect->prepare("SELECT * FROM `users` WHERE `login`=? LIMIT 1");
$query->bind_param("s", $login);
$query->execute();

$result = $query->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    $_SESSION['error_message'] = 'User not found';
    header('Location: /views/RegisterPage.php');
    exit;
}

$_SESSION['user-login'] = $login;
header('Location: /views/AccountPage.php');
exit;

