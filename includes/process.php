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

    $query = "SELECT Email FROM msmes WHERE Email = ?";
    $result = $conn->execute_query($query, [$Email]);
    if ($result->num_rows) {
        $query = "UPDATE `msmes` SET `FirstName` = ?,`MiddleName` = ?,`LastName` = ?,`Email` = ?,`Phone` = ?,`Province` = ?,`IndustryCluster` = ?,`BusinessName` = ? WHERE Email = ?";
        $fields = [$FirstName, $MiddleName, $LastName, $Email, $Phone, $Province, $IndustryCluster, $BusinessName, $Email];
    } else {
        $query = "INSERT INTO `msmes` (`FirstName`,`MiddleName`,`LastName`,`Email`,`Phone`,`Province`,`IndustryCluster`,`BusinessName`) VALUES (?,?,?,?,?,?,?,?)";
        $fields = [$FirstName, $MiddleName, $LastName, $Email, $Phone, $Province, $IndustryCluster, $BusinessName];
    }

    try {
        $result = $conn->execute_query($query, $fields);

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

// Registration
if (isset($_POST['Register'])) {

    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $MiddleName = $conn->real_escape_string($_POST['MiddleName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $Email = $conn->real_escape_string($_POST['Email']);
    $Username = $conn->real_escape_string($_POST['Username']);
    $Password = $conn->real_escape_string($_POST['Password']);

    $HashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    $query = "INSERT INTO `users` (`FirstName`,`MiddleName`,`LastName`,`Email`,`Username`,`Password`) VALUES (?,?,?,?,?,?)";
    try {

        $result = $conn->execute_query($query, [$FirstName, $MiddleName, $LastName, $Email, $Username, $HashedPassword]);

        if ($result) {

            $response['status'] = 'success';
            $response['message'] = 'Registration successful!';
            $response['redirect'] = 'login.php';
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Registration failed!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

// Login
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

                $response['status'] = 'success';
                $response['message'] = 'Login successful!';
                $response['redirect'] = 'index.php';
            } else {

                $response['status'] = 'error';
                $response['message'] = 'Invalid Password!';
            }
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Username not found!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

// Update Profile
if (isset($_POST['UpdateProfile'])) {
    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $MiddleName = $conn->real_escape_string($_POST['MiddleName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $Username = $conn->real_escape_string($_POST['Username']);
    $Email = $conn->real_escape_string($_POST['Email']);

    $query = "UPDATE `users` SET `Username`=?,`FirstName`=?,`MiddleName`=?,`LastName`=?,`Email`=? WHERE `Username`=?";
    try {

        $result = $conn->execute_query($query, [$Username, $FirstName, $MiddleName, $LastName, $Email, $_SESSION["Username"]]);

        if ($result) {

            $_SESSION["Username"] = $Username;

            $response['status'] = 'success';
            $response['message'] = 'Profile Updated!';
            $response['redirect'] = 'profile.php';
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Failed Updating Profile!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

// Update Password
if (isset($_POST['UpdatePassword'])) {
    $CurrentPassword = $conn->real_escape_string($_POST['CurrentPassword']);
    $NewPassword = $conn->real_escape_string($_POST['NewPassword']);
    $RenewPassword = $conn->real_escape_string($_POST['RenewPassword']);

    $query = "SELECT * FROM users where Username=?";

    try {
        $result = $conn->execute_query($query, [$_SESSION['Username']]);

        if ($result && $result->num_rows === 1) {

            $row = $result->fetch_object();

            if (password_verify($CurrentPassword, $row->Password)) {
                if ($NewPassword == $RenewPassword) {
                    $HashedPassword = password_hash($NewPassword, PASSWORD_DEFAULT);
                    $query2 = "UPDATE `users` SET `Password`=? WHERE `Username`=?";
                    try {

                        $result2 = $conn->execute_query($query2, [$HashedPassword, $_SESSION["Username"]]);

                        if ($result2) {

                            $response['status'] = 'success';
                            $response['message'] = 'Password Changed!';
                            $response['redirect'] = 'profile.php';
                        } else {

                            $response['status'] = 'error';
                            $response['message'] = 'Failed changing password!';
                        }
                    } catch (Exception $e) {
                        $response['status'] = 'error';
                        $response['message'] = $e->getMessage();
                    }
                } else {

                    $response['status'] = 'error';
                    $response['message'] = 'Password don\'t match!';
                }
            } else {

                $response['status'] = 'error';
                $response['message'] = 'Invalid Password!';
            }
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Username not found!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['AutoFill'])) {
    $Email = $conn->real_escape_string($_POST['Email']);

    $query = "SELECT * FROM msmes WHERE Email=?";
    $result = $conn->execute_query($query, [$Email]);
    while ($row = $result->fetch_object()) {
        $response[] = $row;
    }
}

echo json_encode($response);

$conn->close();
