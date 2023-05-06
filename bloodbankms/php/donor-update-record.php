<?php
// Check if donorID is set
if (isset($_POST['donorID'])) {
    $donorID = $_POST['donorID'];

    // Include database configuration
    require_once 'server.php';

    // Assign values to variables
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $bloodType = mysqli_real_escape_string($db, $_POST['bloodType']);
    $mobileNumber = mysqli_real_escape_string($db, $_POST['mobileNumber']);
    $emailAddress = mysqli_real_escape_string($db, $_POST['emailAddress']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    // Update donor record in database
    $query = "UPDATE donor SET FirstName='$firstName', LastName='$lastName', Age='$age', Gender='$gender', BloodType='$bloodType', MobileNumber='$mobileNumber', EmailAddress='$emailAddress', Address='$address' WHERE donorID='$donorID'";
    $result = mysqli_query($db, $query);

    if ($result) {
        // Redirect to donor.php
        header("Location: donor.php");
        exit();
    } else {
        // Display error message
        echo "Error updating record: " . mysqli_error($db);
    }
}
?>