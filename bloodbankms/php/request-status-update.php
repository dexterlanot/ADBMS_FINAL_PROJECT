<?php
include_once ('server.php');


// Check if the request ID and new status were provided
if (isset($_POST['requestID']) && isset($_POST['newStatus'])) {
    
    // Get the request ID and new status from the POST data
    $requestID = $_POST['requestID'];
    $newStatus = $_POST['newStatus'];

    // Update the status of the request in the database
    $query = "UPDATE request SET status = '$newStatus' WHERE id = $requestID";
    $result = mysqli_query($db, $query);
    
    // Check if the query was successful
    if ($result) {
        // Fetch the updated data from the database
        $query = "SELECT CONCATreqPrefix,requestID,FirstName,LastName,Age,Gender,BloodType,MobileNumber,EmailAddress,Address,Physician,Date,Status  
        FROM request";
        $result = mysqli_query($db, $query);
        
        // Check if the query was successful
        if ($result) {
            // Build the HTML for the table rows
            $rows = '';
            while ($row = mysqli_fetch_assoc($result)) {
                $rows .= '<tr><td>' . $row['id'] . '</td><td>' . $row['name'] . '</td><td>' . $row['status'] . '</td></tr>';
            }
            // Send the HTML back to the JavaScript function
            echo $rows;
        } else {
            echo 'Error fetching updated data from the database';
        }
    } else {
        echo 'Error updating request status in the database';
    }
} else {
    echo 'Error: Request ID or new status not provided';
}
?>