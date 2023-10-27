<?php

session_start();

if (isset($_SESSION["Username"])) {
    if (isset($_SESSION["Role"])) {
        header("Location: dashboard.php");
    }
} else {
    header("Location: msme.php");
}
