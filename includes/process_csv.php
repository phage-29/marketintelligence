<?php

// requires
require_once 'conn.php';

session_start();

$response = array();

if (isset($_POST["AddSFM"])) {
    $CSVFile = $_FILES["CSVFile"]["tmp_name"];

    $truncateQuery = "TRUNCATE TABLE `sfmains`";
    $result = $conn->execute_query($truncateQuery);

    if (is_readable($CSVFile)) {
        $handle = fopen($CSVFile, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $Main = $data[0];
            $Description = $data[1];
            $Rank = $data[2];
            $Weight = $data[3];
            $insertQuery = "INSERT INTO `sfmains` (`Name`, `Description`, `Rank`, `Weight`) VALUES (?, ?, ?, ?)";
            $result = $conn->execute_query($insertQuery, [$Main, $Description, $Rank, $Weight]);
        }
        $response['status'] = 'success';
        $response['message'] = 'Record inserted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: Unable to read the CSV file.';
    }
}

if (isset($_POST["AddSFS"])) {
    $CSVFile = $_FILES["CSVFile"]["tmp_name"];
    if (is_readable($CSVFile)) {

        $truncateQuery = "TRUNCATE TABLE `sfsubmains`";
        $result = $conn->execute_query($truncateQuery);

        $handle = fopen($CSVFile, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $Main = $data[0];
            $Submain = $data[1];
            $Description = $data[2];
            $Rank = $data[3];
            $Weight = $data[4];

            $insertQuery = "INSERT INTO `sfsubmains` (`SFMID`, `Name`, `Description`, `Rank`, `Weight`) VALUES ((SELECT `id` FROM `sfmains` WHERE `Name` = ?), ?, ?, ?, ?)";
            $result = $conn->execute_query($insertQuery, [$Main, $Submain, $Description, $Rank, $Weight]);
        }
        $response['status'] = 'success';
        $response['message'] = 'Record inserted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: Unable to read the CSV file.';
    }
}

if (isset($_POST["AddSWOT"])) {
    $CSVFile = $_FILES["CSVFile"]["tmp_name"];

    $truncateQuery = "TRUNCATE TABLE `swots`"; // Truncate the table to remove existing data
    $result = $conn->execute_query($truncateQuery);

    if (is_readable($CSVFile)) {
        $handle = fopen($CSVFile, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $Category = $data[0];
            $Name = $data[1];
            $Description = $data[2];

            // Insert the data into the swots table
            $insertQuery = "INSERT INTO `swots` (`Category`, `Name`, `Description`) VALUES (?, ?, ?)";
            $result = $conn->execute_query($insertQuery, [$Category, $Name, $Description]);
        }

        $response['status'] = 'success';
        $response['message'] = 'Records inserted successfully from CSV file.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: Unable to read the CSV file.';
    }
}


if (isset($_POST["AddCFM"])) {
    $CSVFile = $_FILES["CSVFile"]["tmp_name"];

    $truncateQuery = "TRUNCATE TABLE `cfmains`";
    $result = $conn->execute_query($truncateQuery);

    if (is_readable($CSVFile)) {
        $handle = fopen($CSVFile, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $Main = $data[0];
            $Description = $data[1];
            $insertQuery = "INSERT INTO `cfmains` (`Name`, `Description`) VALUES (?, ?)";
            $result = $conn->execute_query($insertQuery, [$Main, $Description]);
        }
        $response['status'] = 'success';
        $response['message'] = 'Record inserted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: Unable to read the CSV file.';
    }
}

if (isset($_POST["AddCFS"])) {
    $CSVFile = $_FILES["CSVFile"]["tmp_name"];
    if (is_readable($CSVFile)) {

        $truncateQuery = "TRUNCATE TABLE `cfsubmains`";
        $result = $conn->execute_query($truncateQuery);

        $handle = fopen($CSVFile, "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $Main = $data[0];
            $Submain = $data[1];
            $Description = $data[2];

            $insertQuery = "INSERT INTO `cfsubmains` (`CFMID`, `Name`, `Description`) VALUES ((SELECT `id` FROM `cfmains` WHERE `Name` = ?), ?, ?)";
            $result = $conn->execute_query($insertQuery, [$Main, $Submain, $Description]);
        }
        $response['status'] = 'success';
        $response['message'] = 'Record inserted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: Unable to read the CSV file.';
    }
}

echo json_encode($response);
fclose($handle);
$conn->close();
