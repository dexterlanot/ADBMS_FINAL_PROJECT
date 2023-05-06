<?php
// Check if donorID is set
if (isset($_GET['donorID'])) {
    $donorID = $_GET['donorID'];

    // Include database configuration
    require_once 'server.php';

    // Get donor record from database
    $query = "SELECT * FROM donor WHERE donorID = '$donorID'";
    $result = mysqli_query($db, $query);

    // Check if donor record exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Assign values to variables
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
        $age = $row['Age'];
        $gender = $row['Gender'];
        $bloodType = $row['BloodType'];
        $mobileNumber = $row['MobileNumber'];
        $emailAddress = $row['EmailAddress'];
        $address = $row['Address'];
        $date = $row['Date'];
    }
}


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

$result = mysqli_query($db, $sql);

if($result){
?>

<script>
  alert('Donor information added successfully.')
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

<form id="edit-donor-form">
    <div class="edit-form">
    <input type="hidden" name="donorID" value="<?php echo $donorID; ?>">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
        </div>
        <div class="form-group gender">
            <label for="gender">Gender:</label>
            <br>
            <input type="radio" id="male" name="gender" value="Male" <?php if ($gender == 'Male') { echo 'checked'; } ?>>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" <?php if ($gender == 'Female') { echo 'checked'; } ?>>
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="Other" <?php if ($gender == 'Other') { echo 'checked'; } ?>>
            <label for="other">Other</label>
        </div>
        <div class="form-group">
            <label for="bloodType">Blood Type:</label>
            <select class="form-control" id="bloodType" name="bloodType" required>
                <option value="">--</option>
                <option value="A+"<?php if ($bloodType == 'A+') { echo ' selected'; } ?>>A+</option>
                <option value="A-"<?php if ($bloodType == 'A-') { echo ' selected'; } ?>>A-</option>
                <option value="B+"<?php if ($bloodType == 'B+') { echo ' selected'; } ?>>B+</option>
                <option value="B-"<?php if ($bloodType == 'B-') { echo ' selected'; } ?>>B-</option>
                <option value="O+"<?php if ($bloodType == 'O+') { echo ' selected'; } ?>>O+</option>
                <option value="O-"<?php if ($bloodType == 'O-') { echo ' selected'; } ?>>O-</option>
                <option value="AB+"<?php if ($bloodType == 'AB+') { echo ' selected'; } ?>>AB+</option>
                <option value="AB-"<?php if ($bloodType == 'AB-') { echo ' selected'; } ?>>AB-</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mobileNumber">Mobile Number:</label>
            <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" value="<?php echo $mobileNumber; ?>" required>
        </div>
        <div class="form-group">
            <label for="emailAddress">Email Address:</label>
            <input type="email" class="form-control" id="emailAddress" name="emailAddress" value="<?php echo $emailAddress; ?>" required>
        </div>
            <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>


<script>
$(document).ready(function() {
    $('#edit-donor-form').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: 'donor-update-record.php',
            data: formData,
            success: function(response) {
                alert('Donor record updated successfully!');
                $('.allContent-section').load('../php/donor.php');
            },
            error: function(xhr, status, error) {
                alert('Error updating donor record: ' + error);
            }
        });
    });
});
</script>