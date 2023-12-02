<?php
// requires
require_once 'conn.php';

session_start();

if (isset($_SESSION['Email'])) {
    $query = "SELECT * FROM `msmes` WHERE `Email`=?";
    $result = $conn->execute_query($query, [$_SESSION['Email']]);
    $acc = $result->fetch_object();
} else {
    if ($page != "MSME") {
        header("Location: msme.php");
    }
}
