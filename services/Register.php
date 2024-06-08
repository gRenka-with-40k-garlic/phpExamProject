<?php
session_start();
require_once '../db.php';

$name = $_POST['name'] ?? '';
$login = $_POST['login'] ?? '';
$pass = $_POST['pass'] ?? '';
$confirmPass = $_POST['confirm-pass'] ?? '';


if ($pass !== $confirmPass) {
    $_SESSION['error_message'] = 'Passwords do not match';
    header('Location: /views/RegisterPage.php');
    exit;
}

$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `login`='$login'");
if (mysqli_num_rows($query) > 0) {
    $_SESSION['error_message'] = 'Login already taken';
    header('Location: /views/RegisterPage.php');
    exit;
}

$enc_pass = md5($pass);

$insert_query = mysqli_prepare($connect, "INSERT INTO `users` ( `name`, `login`, `pass`) VALUES ( ?, ?, ?)");
mysqli_stmt_bind_param($insert_query, "sss", $name, $login, $enc_pass);

if (mysqli_stmt_execute($insert_query)) {
    $_SESSION['success'] = true;
    header('Location: /views/LoginPage.php');
    exit;
} else {
    $_SESSION['error_message'] = 'User creation failed';
    header('Location: /views/RegisterPage.php');
    exit;
}

