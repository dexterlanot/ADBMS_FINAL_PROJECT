<!DOCTYPE html>
<html>
  <head>
    <title>Request for Blood</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/donate-request.css">
    <link rel="icon" type="image/x-icon" href="images/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
  <body>
    <!-- HEADER -->
    <header>
      <div class="container">
        <div class="brand-name">
          <a href="index.html"><img src="images/bbmslogo.png"></a>
        </div>
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html#about">About</a></li>
            <li><a href="index.html#services">Services</a></li>
            <li><a href="index.html#contact">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- HEADER -->

    <!-- FORMS -->
    <section class="dataform">
      <div class="container">
        <div class="content">
          <h1>Request for blood</h1>
        </div>
          <form action="" method="POST">          
          <label for="fname">First Name:</label>
          <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>

          <label for="lname">Last Name:</label>
          <input type="text" id="lname" name="lname" placeholder="Enter your last name" required>

          <p>Gender:</p>
          <input type="radio" id="gender" name="gender" value="Male" required>
          <label for="gender">Male</label>
          <input type="radio" id="gender" name="gender" value="Female">
          <label for="gender">Female</label>
          <input type="radio" id="gender" name="gender" value="Other">
          <label for="gender">Other</label>

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

          <label for="age">Age:</label>
          <input type="number" id="age" name="age" placeholder="Enter your age" required>
          
          <label for="mobno">Mobile Number:</label>
          <input type="text" id="mobno" name="mobno" placeholder="Enter your mobile number" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email address" required>

          <label for="address">Home Address:</label>
          <input type="text" id="address" name="address" placeholder="Enter your home address" required>

          <label for="doc">Physician:</label>
          <input type="text" id="doc" name="doc" placeholder="Enter your physician's name">

          <input type="submit" name="submit" value="Submit">
        </form>
      </div>
    </section>
    <!-- FORMS -->

    <?php
//connecting to database
include ('./php/server.php');


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
VALUES ('$fname', '$lname', '$gender', '$age', '$blood', '$mobno', '$mail', '$address', '$doc')";

$result = mysqli_query($db, $sql);

if($result){
?>

<script>
  alert('Request information added successfully.')
</script>

  <?php
  } else {
  ?>
<script>
  alert('Failed. Please try again.')
</script>
<?php
}
}
?>

    <!-- FOOTER -->
    <footer>
      <p>Copyright &copy; 2023. Website by IT-2202 Students.</p>
    </footer>
    <!-- FOOTER -->
  </body>
</html>
