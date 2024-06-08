<?php
$connect = new mysqli('localhost', 'root', '', 'test');
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}