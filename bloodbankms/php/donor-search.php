<?php
// Connect to the database
include_once('server.php');

// Get the search term from the form input
$searchTerm = $_POST['query'];

// Build the SQL query
$sql = "SELECT *
        FROM Donor
        WHERE CONCAT(donorPrefix, donorID) LIKE '%{$searchTerm}%'
        OR FirstName LIKE '%{$searchTerm}%'
        OR LastName LIKE '%{$searchTerm}%'
        OR BloodType LIKE '%{$searchTerm}%'";

// Execute the query and get the result
$result = mysqli_query($db, $sql);

// Display the search results in a table format
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Name</th>';
echo '<th>Age</th>';
echo '<th>Gender</th>';
echo '<th>Blood Type</th>';
echo '<th>Mobile Number</th>';
echo '<th>Email Address</th>';
echo '<th>Address</th>';
echo '<th>Date</th>';
echo '<th>Actions</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['donorPrefix'] . '' . $row['donorID'] . '</td>';
    echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
    echo '<td>' . $row['Age'] . '</td>';
    echo '<td>' . $row['Gender'] . '</td>';
    echo '<td>' . $row['BloodType'] . '</td>';
    echo '<td>' . $row['MobileNumber'] . '</td>';
    echo '<td>' . $row['EmailAddress'] . '</td>';
    echo '<td>' . $row['Address'] . '</td>';
    echo '<td>' . $row['Date'] . '</td>';
    echo '<td>' . '<button class="donor-btn" type="button" onclick="insertBloodStock('.$row['donorID'].')"> <i class="fa-solid fa-plus"></i> </button>';
    echo '<button class="donor-btn" type="button" data-toggle="modal" data-target="#editModal" onclick="editDonor('.$row['donorID'].')"> <i class="fa-solid fa-pen"></i> </button>';
    echo '<button class="donor-btn" type="button" onclick="deleteDonor('.$row['donorID'].')"> <i class="fa-solid fa-trash"></i> </button>' . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
