<?php
//connecting to database
include ('server.php');

//initializing variables
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$blood=$_POST['blood'];
$mobno=$_POST['mobno'];
$mail=$_POST['email'];
$address=$_POST['address'];
$doc=$_POST['doc']

//insert data into tables
$sql="INSERT INTO request (FirstName, LastName, Gender, Age, MobileNumber, EmailAddress, Address, BloodType, Physician) 
VALUES ('$fname', '$lname', '$gender', '$age',  $mobno', '$mail', '$address', '$blood', '$doc')";

if ($db->query($sql) === TRUE) {
  echo "Succesfully added";
  header("Location: ../index.html");
} else {
  echo "Error: " . $sql . "<br>" . $db->error;
}
?>
