<html>
  <head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
  $('#insert-donor-form').submit(function(event) {
   // event.preventDefault(); // prevent the default form submit action


    var formData = $("#insert-donor-form").serialize();    

    $.ajax({
      type: 'POST',
      url: '../php/donor-insertfile.php',
      data: formData,
      success: function(data) {
        alert('Donor inserted successfully');
        $('.allContent-section').load('../php/donor-insert.php');
      },
      error: function() {
        alert('Error in inserting blood stock');
      }
});
      });
});
</script>
  </head>
  <body>
    <form id="insert-donor-form" action="donor-insertfile.php"  method="POST">
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
                <select name="blood" id="blood" required>
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
            <input type="submit" id="submitBtn" name="submit" value="Submit">
        </div>
    </form>
    <!-- FORMS -->
  </body>
</html>

