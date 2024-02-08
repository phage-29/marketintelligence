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
    $EDTLevel = $conn->real_escape_string($_POST['EDTLevel']);
    $AssetSize = $conn->real_escape_string($_POST['AssetSize']);

    // Check if a record with the same email exists
    $queryCheck = "SELECT * FROM `msmes` WHERE `Email` = ?";
    $resultCheck = $conn->execute_query($queryCheck, [$Email]);

    if ($resultCheck->num_rows > 0) {
        // Record exists, update it
        $queryUpdate = "UPDATE `msmes` SET `FirstName` = ?, `MiddleName` = ?, `LastName` = ?, `Phone` = ?, `Province` = ?, `IndustryCluster` = ?, `BusinessName` = ?, `EDTLevel` = ?, `AssetSize` = ? WHERE `Email` = ?";
        $resultUpdate = $conn->execute_query($queryUpdate, [$FirstName, $MiddleName, $LastName, $Phone, $Province, $IndustryCluster, $BusinessName, $EDTLevel, $AssetSize, $Email]);

        if ($resultUpdate) {
            $_SESSION['Email'] = $Email;
            $response['status'] = 'success';
            $response['message'] = 'MSME information updated!';
            $response['redirect'] = 'success-factors.php';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Update failed!';
        }
    } else {
        // Record doesn't exist, insert a new one
        $queryInsert = "INSERT INTO `msmes` (`FirstName`, `MiddleName`, `LastName`, `Email`, `Phone`, `Province`, `IndustryCluster`, `BusinessName`, `EDTLevel`, `AssetSize`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $resultInsert = $conn->execute_query($queryInsert, [$FirstName, $MiddleName, $LastName, $Email, $Phone, $Province, $IndustryCluster, $BusinessName, $EDTLevel, $AssetSize]);

        if ($resultInsert) {
            $_SESSION['Email'] = $Email;
            $response['status'] = 'success';
            $response['message'] = 'MSME registered!';
            $response['redirect'] = 'success-factors.php';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Registration failed!';
        }
    }
}

// Registration
if (isset($_POST['viewScorecard'])) {

    $Email = $conn->real_escape_string($_POST['Email']);

    // Check if a record with the same email exists
    $queryCheck = "SELECT * FROM `msmes` WHERE `Email` = ?";
    $resultCheck = $conn->execute_query($queryCheck, [$Email]);

    if ($resultCheck->num_rows > 0) {
        
            $_SESSION['Email'] = $Email;
            $response['status'] = 'success';
            $response['message'] = 'MSME information updated!';
            $response['redirect'] = 'generated-scorecard.php';
        
    } else {
        // Record doesn't exist, insert a new one
        $response['status'] = 'error';
        $response['message'] = 'Take assessment first to view Scorecard!';
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

if (isset($_POST["AddSFM"])) {
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);
    $Rank = $conn->real_escape_string($_POST['Rank']);
    $Weight = $conn->real_escape_string($_POST['Weight']);

    $query = "SELECT * FROM `sfmains` WHERE `Name` = ?";
    $result = $conn->execute_query($query, [$Name]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "INSERT INTO `sfmains` (`Name`, `Description`, `Rank`, `Weight`) VALUES (?, ?, ?, ?)";
        $result2 = $conn->execute_query($query2, [$Name, $Description, $Rank, $Weight]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record.';
        }
    }
}
if (isset($_POST["EditSFM"])) {
    $id = $conn->real_escape_string($_POST['EditSFM']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);
    $Rank = $conn->real_escape_string($_POST['Rank']);
    $Weight = $conn->real_escape_string($_POST['Weight']);

    $query = "SELECT * FROM `sfmains` WHERE `Name` = ? AND `id` != ?";
    $result = $conn->execute_query($query, [$Name, $id]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "UPDATE `sfmains` SET `Name` = ?, `Description` = ?, `Rank` = ?, `Weight` = ? WHERE `id` = ?";
        $result2 = $conn->execute_query($query2, [$Name, $Description, $Rank, $Weight, $id]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update the record.';
        }
    }
}
if (isset($_POST["DelSFM"])) {
    $id = $conn->real_escape_string($_POST['DelSFM']);

    $query = "DELETE FROM `sfmains` WHERE `id` = ?";
    $result = $conn->execute_query($query, [$id]);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'Record deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete the record.';
    }
}
if (isset($_POST["AddSFS"])) {
    $SFMID = $conn->real_escape_string($_POST['SFMID']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);
    $Rank = $conn->real_escape_string($_POST['Rank']);
    $Weight = $conn->real_escape_string($_POST['Weight']);

    $query = "SELECT * FROM `sfsubmains` WHERE `Name` = ?";
    $result = $conn->execute_query($query, [$Name]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "INSERT INTO `sfsubmains` (`SFMID`, `Name`, `Description`, `Rank`, `Weight`) VALUES (?, ?, ?, ?, ?)";
        $result2 = $conn->execute_query($query2, [$SFMID, $Name, $Description, $Rank, $Weight]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record.';
        }
    }
}
if (isset($_POST["EditSFS"])) {
    $id = $conn->real_escape_string($_POST['EditSFS']);
    $SFMID = $conn->real_escape_string($_POST['Main']);
    $Name = $conn->real_escape_string($_POST['Submain']);
    $Description = $conn->real_escape_string($_POST['Description']);
    $Rank = $conn->real_escape_string($_POST['Rank']);
    $Weight = $conn->real_escape_string($_POST['Weight']);

    $query = "SELECT * FROM `sfsubmains` WHERE `Name` = ? AND `id` != ?";
    $result = $conn->execute_query($query, [$Name, $id]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "UPDATE `sfsubmains` SET `SFMID` = ?, `Name` = ?, `Description` = ?, `Rank` = ?, `Weight` = ? WHERE `id` = ?";
        $result2 = $conn->execute_query($query2, [$SFMID, $Name, $Description, $Rank, $Weight, $id]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update the record.';
        }
    }
}
if (isset($_POST["DelSFS"])) {
    $id = $conn->real_escape_string($_POST['DelSFS']);

    $query = "DELETE FROM `sfsubmains` WHERE `id` = ?";
    $result = $conn->execute_query($query, [$id]);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'Record deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete the record.';
    }
}


if (isset($_POST["AddSWOT"])) {
    $Category = $conn->real_escape_string($_POST['Category']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);

    // Check if a record with the same name and category already exists
    $query = "SELECT * FROM `swots` WHERE `Name` = ? AND `Category` = ?";
    $result = $conn->execute_query($query, [$Name, $Category]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name and category already exists.';
    } else {
        $query2 = "INSERT INTO `swots` (`Category`, `Name`, `Description`) VALUES (?, ?, ?)";
        $result2 = $conn->execute_query($query2, [$Category, $Name, $Description]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record.';
        }
    }
}
if (isset($_POST["EditSWOT"])) {
    $id = $conn->real_escape_string($_POST['EditSWOT']);
    $Category = $conn->real_escape_string($_POST['Category']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);

    // Check if a record with the same name, category, and a different ID already exists
    $query = "SELECT * FROM `swots` WHERE `Name` = ? AND `Category` = ? AND `id` != ?";
    $result = $conn->execute_query($query, [$Name, $Category, $id]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name and category already exists.';
    } else {
        $query2 = "UPDATE `swots` SET `Category` = ?, `Name` = ?, `Description` = ? WHERE `id` = ?";
        $result2 = $conn->execute_query($query2, [$Category, $Name, $Description, $id]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update the record.';
        }
    }
}
if (isset($_POST["DelSWOT"])) {
    $id = $conn->real_escape_string($_POST['DelSWOT']);

    $query = "DELETE FROM `swots` WHERE `id` = ?";
    $result = $conn->execute_query($query, [$id]);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'Record deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete the record.';
    }
}


if (isset($_POST["AddCFM"])) {
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);

    $query = "SELECT * FROM `cfmains` WHERE `Name` = ?";
    $result = $conn->execute_query($query, [$Name]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "INSERT INTO `cfmains` (`Name`, `Description`) VALUES (?, ?)";
        $result2 = $conn->execute_query($query2, [$Name, $Description]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record.';
        }
    }
}
if (isset($_POST["EditCFM"])) {
    $id = $conn->real_escape_string($_POST['EditCFM']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);

    $query = "SELECT * FROM `cfmains` WHERE `Name` = ? AND `id` != ?";
    $result = $conn->execute_query($query, [$Name, $id]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "UPDATE `cfmains` SET `Name` = ?, `Description` = ? WHERE `id` = ?";
        $result2 = $conn->execute_query($query2, [$Name, $Description, $id]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update the record.';
        }
    }
}
if (isset($_POST["DelCFM"])) {
    $id = $conn->real_escape_string($_POST['DelCFM']);

    $query = "DELETE FROM `cfmains` WHERE `id` = ?";
    $result = $conn->execute_query($query, [$id]);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'Record deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete the record.';
    }
}
if (isset($_POST["AddCFS"])) {
    $CFMID = $conn->real_escape_string($_POST['CFMID']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $Description = $conn->real_escape_string($_POST['Description']);

    $query = "SELECT * FROM `cfsubmains` WHERE `Name` = ?";
    $result = $conn->execute_query($query, [$Name]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "INSERT INTO `cfsubmains` (`CFMID`, `Name`, `Description`) VALUES (?, ?, ?)";
        $result2 = $conn->execute_query($query2, [$CFMID, $Name, $Description]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record.';
        }
    }
}
if (isset($_POST["EditCFS"])) {
    $id = $conn->real_escape_string($_POST['EditCFS']);
    $CFMID = $conn->real_escape_string($_POST['Main']);
    $Name = $conn->real_escape_string($_POST['Submain']);
    $Description = $conn->real_escape_string($_POST['Description']);

    $query = "SELECT * FROM `cfsubmains` WHERE `Name` = ? AND `id` != ?";
    $result = $conn->execute_query($query, [$Name, $id]);

    if ($result->num_rows) {
        $response['status'] = 'error';
        $response['message'] = 'Record with the same name already exists.';
    } else {
        $query2 = "UPDATE `cfsubmains` SET `CFMID` = ?, `Name` = ?, `Description` = ? WHERE `id` = ?";
        $result2 = $conn->execute_query($query2, [$CFMID, $Name, $Description, $id]);

        if ($result2) {
            $response['status'] = 'success';
            $response['message'] = 'Record updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update the record.';
        }
    }
}
if (isset($_POST["DelCFS"])) {
    $id = $conn->real_escape_string($_POST['DelCFS']);

    $query = "DELETE FROM `cfsubmains` WHERE `id` = ?";
    $result = $conn->execute_query($query, [$id]);

    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'Record deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete the record.';
    }
}

if (isset($_POST['AddSFAssessment'])) {
    $MSMEID = $conn->real_escape_string($_POST['MSMEID']);
    $SFMID = $conn->real_escape_string($_POST['SFMID']);
    $SFSID = $conn->real_escape_string($_POST['SFSID']);
    $Value = $conn->real_escape_string($_POST['Value']);

    $queryCheck = "SELECT * FROM `assessments` WHERE `MSMEID` = ? AND `SFMID` = ? AND `SFSID` = ?";
    $resultCheck = $conn->execute_query($queryCheck, [$MSMEID, $SFMID, $SFSID]);

    if ($resultCheck->num_rows > 0) {
        $queryUpdate = "UPDATE `assessments` SET `Value` = ? WHERE `MSMEID` = ? AND `SFMID` = ? AND `SFSID` = ?";
        $resultUpdate = $conn->execute_query($queryUpdate, [$Value, $MSMEID, $SFMID, $SFSID]);

        if ($resultUpdate) {
            $response['status'] = 'success';
            $response['message'] = 'Record updated successfully.';

            $query = "SELECT (SELECT COUNT(id) from sfsubmains)-(SELECT COUNT(id) from assessments WHERE MSMEID=?) as Remaining";
            $result = $conn->execute_query($query, [$MSMEID]);
            if ($result->fetch_object()->Remaining == 0) {
?>
                <script>
                    console.log("ALL GOODS");
                </script>
            <?php
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update the record.';
        }
    } else {
        // Record doesn't exist, insert a new one
        $queryInsert = "INSERT INTO `assessments` (`AssessmentType`, `MSMEID`, `SFMID`, `SFSID`, `Value`) VALUES (?, ?, ?, ?, ?)";
        $resultInsert = $conn->execute_query($queryInsert, ['success factors', $MSMEID, $SFMID, $SFSID, $Value]);

        if ($resultInsert) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully.';

            $query = "SELECT (SELECT COUNT(id) from sfsubmains)-(SELECT COUNT(id) from assessments WHERE MSMEID=?) as Remaining";
            $result = $conn->execute_query($query, [$MSMEID]);
            if ($result->fetch_object()->Remaining == 0) {
            ?>
                <script>
                    console.log("ALL GOODS");
                </script>
<?php
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record.';
        }
    }
}

if (isset($_POST['AddSWOTAssessment'])) {
    $MSMEID = $conn->real_escape_string($_POST['MSMEID']);
    $SWOTID = $conn->real_escape_string($_POST['SWOTID']);

    $queryCheckDuplicate = "SELECT * FROM `assessments` WHERE `MSMEID` = ? AND `SWOTID` = ?";
    $resultCheckDuplicate = $conn->execute_query($queryCheckDuplicate, [$MSMEID, $SWOTID]);

    if ($resultCheckDuplicate->num_rows > 0) {
        $response['status'] = 'error';
        $response['message'] = 'Duplicate record';
    } else {
        $queryInsert = "INSERT INTO `assessments` (`AssessmentType`, `MSMEID`, `SWOTID`) VALUES (?, ?, ?)";
        $resultInsert = $conn->execute_query($queryInsert, ['swot analysis', $MSMEID, $SWOTID]);

        if ($resultInsert) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record';
        }
    }
}


if (isset($_POST['DeleteSWOTAssessment'])) {
    $MSMEID = $conn->real_escape_string($_POST['MSMEID']);
    $SWOTID = $conn->real_escape_string($_POST['SWOTID']);

    $queryCheck = "SELECT * FROM `assessments` WHERE `MSMEID` = ? AND `SWOTID` = ?";
    $resultCheck = $conn->execute_query($queryCheck, [$MSMEID, $SWOTID]);

    if ($resultCheck->num_rows > 0) {
        $queryDelete = "DELETE FROM `assessments` WHERE `MSMEID` = ? AND `SWOTID` = ?";
        $resultDelete = $conn->execute_query($queryDelete, [$MSMEID, $SWOTID]);

        if ($resultDelete) {
            $response['status'] = 'success';
            $response['message'] = 'Record deleted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to delete the record';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Record not found';
    }
}

if (isset($_POST['AddCFAssessment'])) {
    $MSMEID = $conn->real_escape_string($_POST['MSMEID']);
    $CFMID = $conn->real_escape_string($_POST['CFMID']);
    $CFSID = $conn->real_escape_string($_POST['CFSID']);

    $queryCheckDuplicate = "SELECT * FROM `assessments` WHERE `MSMEID` = ? AND `CFMID` = ? AND `CFSID` = ?";
    $resultCheckDuplicate = $conn->execute_query($queryCheckDuplicate, [$MSMEID, $CFMID, $CFSID]);

    if ($resultCheckDuplicate->num_rows > 0) {
        $response['status'] = 'error';
        $response['message'] = 'Duplicate record';
    } else {
        $queryInsert = "INSERT INTO `assessments` (`AssessmentType`, `MSMEID`, `CFMID`, `CFSID`) VALUES (?, ?, ?, ?)";
        $resultInsert = $conn->execute_query($queryInsert, ['competitors features', $MSMEID, $CFMID, $CFSID]);

        if ($resultInsert) {
            $response['status'] = 'success';
            $response['message'] = 'Record inserted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to insert the record';
        }
    }
}


if (isset($_POST['DeleteCFAssessment'])) {
    $MSMEID = $conn->real_escape_string($_POST['MSMEID']);
    $CFMID = $conn->real_escape_string($_POST['CFMID']);
    $CFSID = $conn->real_escape_string($_POST['CFSID']);

    $queryCheck = "SELECT * FROM `assessments` WHERE `MSMEID` = ? AND `CFMID` = ? AND `CFSID` = ?";
    $resultCheck = $conn->execute_query($queryCheck, [$MSMEID, $CFMID, $CFSID]);

    if ($resultCheck->num_rows > 0) {
        $queryDelete = "DELETE FROM `assessments` WHERE `MSMEID` = ? AND `CFMID` = ? AND `CFSID` = ?";
        $resultDelete = $conn->execute_query($queryDelete, [$MSMEID, $CFMID, $CFSID]);

        if ($resultDelete) {
            $response['status'] = 'success';
            $response['message'] = 'Record deleted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to delete the record';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Record not found';
    }
}

echo json_encode($response);

$conn->close();
