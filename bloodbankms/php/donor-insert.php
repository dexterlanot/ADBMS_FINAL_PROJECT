    <form class="add-form-container" id="insert-donor-form" method="POST">
          <h2>Add Donor</h2>
    <div class="insert-form">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" placeholder="Enter donor's first name" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" placeholder="Enter donor's last name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" placeholder="Enter donor's age" required>
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
                <input type="text" id="mobno" name="mobno" placeholder="Enter donor's mobile number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter donor's email address" required>
            </div>
            <div class="form-group">
                <label for="address">Home Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter donor's home address" required>
            </div>
        </div>
        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <!-- FORMS -->

<script>
$(document).ready(function() {
    $('#insert-donor-form').submit(function(e) {
        e.preventDefault(); // prevent the default form submit action
        var formData = $(this).serialize(); // serialize form data
        $.ajax({
            url: 'donor-insert-submit.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Donor record added successfully!');
                $('#insert-donor-form')[0].reset();

            },
            error: function(xhr, status, error) {
                alert('Failed. Please try again.');
            }
        });
    });
});
</script>