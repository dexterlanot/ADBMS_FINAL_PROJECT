<?php
include_once('server.php');

// Get the request ID from the AJAX request
$requestID = $_POST['requestID'];

// Delete the request with the given ID from the database
$sql = "DELETE FROM request WHERE requestID = $requestID";
if (mysqli_query($db, $sql)) {
    echo "Request deleted successfully";
} else {
    echo "Error deleting request: " . mysqli_error($db);
}
?>