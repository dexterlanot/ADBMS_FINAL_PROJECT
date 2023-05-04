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

//insert data into tables
$sql="INSERT INTO donor (FirstName, LastName, Gender, Age, BloodType, MobileNumber, EmailAddress, Address) 
VALUES ('$fname', '$lname', '$gender', '$age', '$blood', $mobno', '$mail', '$address')";

if ($db->query($sql) === TRUE) {
  echo "Succesfully added";
  header("Location: ../index.html");
} else {
  echo "Error: " . $sql . "<br>" . $db->error;
}
?>
