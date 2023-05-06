<?php
include_once ('server.php');

// Get the donor ID from the AJAX request
$donorID = $_POST['donorID'];

// Delete the donor with the given ID from the database
$sql = "DELETE FROM donor WHERE donorID = $donorID";
if (mysqli_query($db, $sql)) {
    echo "Donor deleted successfully";
} else {
    echo "Error deleting donor: " . mysqli_error($db);
}
?>