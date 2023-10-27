<?php
// requires
require_once 'conn.php';

session_start();

if (!isset($_SESSION['Username'])) {
    header("Location: login.php");
}

$query = "SELECT * FROM `users` WHERE `Username`=?";
$result = $conn->execute_query($query, [$_SESSION['Username']]);
$acc = $result->fetch_object();
