<?php
//connecting to database
include ('server.php');

if (isset($_POST['submit'])){
    //initializing variables
    $fname= mysqli_real_escape_string($db,$_POST['fname']);
    $lname= mysqli_real_escape_string($db,$_POST['lname']);
    $gender= mysqli_real_escape_string($db,$_POST['gender']);
    $age= mysqli_real_escape_string($db,$_POST['age']);
    $blood= mysqli_real_escape_string($db,$_POST['blood']);
    $mobno= mysqli_real_escape_string($db,$_POST['mobno']);
    $mail= mysqli_real_escape_string($db,$_POST['email']);
    $address= mysqli_real_escape_string($db,$_POST['address']);

    //insert data into tables
    $sql="INSERT INTO donor (FirstName, LastName, Gender, Age, BloodType, MobileNumber, EmailAddress, Address) 
    VALUES ('$fname', '$lname', '$gender', '$age', '$blood', '$mobno', '$mail', '$address')";

    if(mysqli_query($db, $sql)){
    header("Location: ../php/dashboard.php");
    exit();
    } else {
        echo "error"; 
    }
}
?>
