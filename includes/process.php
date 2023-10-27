<?php

// requires
require_once 'conn.php';

session_start();

$response = array();

// Registration
if (isset($_POST['MSME'])) {

    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $MiddleName = $conn->real_escape_string($_POST['MiddleName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $Email = $conn->real_escape_string($_POST['Email']);
    $Phone = $conn->real_escape_string($_POST['Phone']);
    $Province = $conn->real_escape_string($_POST['Province']);
    $IndustryCluster = $conn->real_escape_string($_POST['IndustryCluster']);
    $BusinessName = $conn->real_escape_string($_POST['BusinessName']);

    $query = "INSERT INTO `msmes` (`FirstName`,`MiddleName`,`LastName`,`Email`,`Phone`,`Province`,`IndustryCluster`,`BusinessName`) VALUES (?,?,?,?,?,?,?,?)";

    try {
        $result = $conn->execute_query($query, [$FirstName, $MiddleName, $LastName, $Email, $Phone, $Province, $IndustryCluster, $BusinessName]);

        if ($result) {

            $response['status'] = 'success';
            $response['message'] = 'MSME registered!';
            $response['redirect'] = 'success-factors.php';
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Registration failed!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['Login'])) {

    $Username = $conn->real_escape_string($_POST['Username']);
    $Password = $conn->real_escape_string($_POST['Password']);

    $query = "SELECT * FROM users where Username=?";

    try {
        $result = $conn->execute_query($query, [$Username]);

        if ($result && $result->num_rows === 1) {

            $row = $result->fetch_object();

            if (password_verify($Password, $row->Password)) {

                $_SESSION['Username'] = $Username;
                $_SESSION['Role'] = $row->Role;

                $response['status']   = 'success';
                $response['message']  = 'Login successful!';
                $response['redirect'] = 'dashboard.php';
            } else {

                $response['status']  = 'error';
                $response['message'] = 'Invalid Password!';
            }
        } else {

            $response['status']  = 'error';
            $response['message'] = 'Username not found!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

echo json_encode($response);

$conn->close();
