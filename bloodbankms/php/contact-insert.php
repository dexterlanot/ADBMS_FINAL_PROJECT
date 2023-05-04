<?php
//connecting to database
include ('server.php');

//initializing variables
$fName=$_POST['name'];
$mobNum=$_POST['mobileNo'];
$mail=$_POST['email'];
$msg=$_POST['message'];

//insert data into tables
$sql="INSERT INTO contact (Name, MobileNumber, EmailAddress, Message) 
VALUES ('$fName', '$mobNum', '$mail', '$msg')";

if ($db->query($sql) === TRUE) {
  header("Location: ../index.html");
} else {
  echo "Error: " . $sql . "<br>" . $db->error;
}
?>
