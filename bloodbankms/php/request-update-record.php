<?php
if (isset($_POST['requestID'])) {
    $requestID = $_POST['requestID'];

    require_once 'server.php';

    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $bloodType = mysqli_real_escape_string($db, $_POST['bloodType']);
    $mobileNumber = mysqli_real_escape_string($db, $_POST['mobileNumber']);
    $emailAddress = mysqli_real_escape_string($db, $_POST['doc']);
    $doc = mysqli_real_escape_string($db, $_POST['emailAddress']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    $query = "UPDATE request SET FirstName='$firstName', LastName='$lastName', Age='$age', Gender='$gender', BloodType='$bloodType', MobileNumber='$mobileNumber', EmailAddress='$emailAddress', Physician='$doc' ,Address='$address' WHERE requestID='$requestID'";
    $result = mysqli_query($db, $query);

    if ($result) {
        header("Location: request.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}
?>