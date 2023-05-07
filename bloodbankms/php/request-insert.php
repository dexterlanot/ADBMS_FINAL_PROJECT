<?php
//connecting to database
include ('server.php');


if (isset($_POST['submit'])){
//initializing variables
$fname= mysqli_real_escape_string($db,$_POST['fname']);
$lname= mysqli_real_escape_string($db,$_POST['lname']);
$gender= mysqli_real_escape_string($db,$_POST['gender']);
$age= mysqli_real_escape_string($db,$_POST['age']);
$mobno= mysqli_real_escape_string($db,$_POST['mobno']);
$mail= mysqli_real_escape_string($db,$_POST['email']);
$address= mysqli_real_escape_string($db,$_POST['address']);
$blood= mysqli_real_escape_string($db,$_POST['blood']);
$doc= mysqli_real_escape_string($db,$_POST['doc']);

//insert data into tables
$sql="INSERT INTO request (FirstName, LastName, Gender, Age, BloodType, MobileNumber, EmailAddress, Address, Physician) 
VALUES ('$fname', '$lname', '$gender', '$age', '$mobno', '$mail', '$address', '$blood', '$doc')";

if(mysqli_query($db, $sql)){
  echo "<script>alert('Request information added successfully.')</script>";
  header("Location: ../php/dashboard.php");
  } else {
echo "<script>alert('Failed. Please try again.')</script>";
  }  
}
?>



<form class="add-form-container" action="request-insert.php" method="POST">
          <h2>Add Donor</h2>
    <div class="insert-form">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" placeholder="Enter first name" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" placeholder="Enter last name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" placeholder="Enter age" required>
            </div>
            <div class="form-group">
                <p>Gender:</p><br>
                <input type="radio" id="gender" name="gender" value="Male" required>
                <label for="gender">Male</label>
                <input type="radio" id="gender" name="gender" value="Female">
                <label for="gender">Female</label>
                <input type="radio" id="gender" name="gender" value="Other">
                <label for="gender">Other</label>
            </div>
            <div class="form-group">
                <label for="blood">Blood Type:</label>
                <select name="blood" required>
                <option value="">--</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mobno">Mobile Number:</label>
                <input type="text" id="mobno" name="mobno" placeholder="Enter mobile number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>
            </div>
            <div class="form-group">
                <label for="doc">Physician:</label>
                <input type="text" id="doc" name="doc" placeholder="Enter physician's name">
            </div>
        </div>
        <div class="form-address">
            <label for="address">Home Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter donor's home address" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <!-- FORMS -->
