<?php
include_once('server.php');

// Check if the request ID and new status were provided
if (isset($_POST['requestID']) && isset($_POST['newStatus'])) {
    
    // Get the request ID and new status from the POST data
    $requestID = $_POST['requestID'];
    $newStatus = $_POST['newStatus'];

    // Update the status of the request in the database
    $query = "UPDATE request SET status = '$newStatus' WHERE requestID = $requestID";
    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if ($result) {
        // Find the stockID that matches the blood type of the approved request
        if ($newStatus == 'Approved') {
            $bloodTypeQuery = "SELECT BloodType FROM request WHERE requestID = $requestID";
            $bloodTypeResult = mysqli_query($db, $bloodTypeQuery);

            if ($bloodTypeResult && mysqli_num_rows($bloodTypeResult) > 0) {
                $bloodTypeRow = mysqli_fetch_assoc($bloodTypeResult);
                $bloodType = $bloodTypeRow['BloodType'];

                $stockIDQuery = "SELECT stockID FROM stocks WHERE BloodType = '$bloodType'";
                $stockIDResult = mysqli_query($db, $stockIDQuery);

                if ($stockIDResult && mysqli_num_rows($stockIDResult) > 0) {
                    $stockIDRow = mysqli_fetch_assoc($stockIDResult);
                    $stockID = $stockIDRow['stockID'];

                    // Insert the requestID and stockID into the handed_over table
                    $handedOverQuery = "INSERT INTO handed_over (requestID, stockID) VALUES ($requestID, $stockID)";
                    $handedOverResult = mysqli_query($db, $handedOverQuery);

                    if (!$handedOverResult) {
                        echo 'Error inserting data into handed_over table';
                    }
                } else {
                    echo 'No matching blood stock available.';
                }
            } else {
                echo 'Error fetching blood type from request table';
            }
        }
    }
}
?>
