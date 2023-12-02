<?php

// requires
require_once 'conn.php';

session_start();

$response = array();

if (isset($_POST['sfm'])) {
    $query = "SELECT * FROM `sfmains` WHERE id = ?";
    $result = $conn->execute_query($query, [$_POST['sfm']]);

    $response = $result->fetch_object();
}

if (isset($_POST['sfs'])) {
    $query = "SELECT * FROM `sfsubmains` WHERE id = ?";
    $result = $conn->execute_query($query, [$_POST['sfs']]);

    $response = $result->fetch_object();
}

if (isset($_POST['swot'])) {
    $query = "SELECT * FROM `swots` WHERE id = ?";
    $result = $conn->execute_query($query, [$_POST['swot']]);

    $response = $result->fetch_object();
}

if (isset($_POST['cfm'])) {
    $query = "SELECT * FROM `cfmains` WHERE id = ?";
    $result = $conn->execute_query($query, [$_POST['cfm']]);

    $response = $result->fetch_object();
}

if (isset($_POST['cfs'])) {
    $query = "SELECT * FROM `cfsubmains` WHERE id = ?";
    $result = $conn->execute_query($query, [$_POST['cfs']]);

    $response = $result->fetch_object();
}

if (isset($_POST['GetMSME'])) {
    $query = "SELECT * FROM `msmes` WHERE Email = ?";
    $result = $conn->execute_query($query, [$_POST['GetMSME']]);

    $response = $result->fetch_object();
}

echo json_encode($response);

$conn->close();
