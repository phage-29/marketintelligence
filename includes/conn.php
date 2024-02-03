<?php
$servername = "localhost";
<<<<<<< HEAD
$username = "root";
$password = "datacode";
=======
$username = "zoomrequestadmin";
$password = "!r7TG4WuxCRJUgoo";
>>>>>>> ef56787e44e853ed813826455fafd21a8f9fb000
$database = "marketinteldb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$website = "Market Intelligence";
?>
